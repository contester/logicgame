var step = 1,
	score = 0,
	pointsForHelp = -1,
	pointsForWrongAnswer = -1,
	scoreForTask = 0,
	currentHelp,
	tasksCountInGroup = 6;
	
$(function(){
	currentHelp = window.logicgame_response.prompts ? +window.logicgame_response.prompts : 0;
	$.each(window.logicgame_response.response, function(index, elem){
		if(elem == 0){
			if (index === 0){
				$('#logicgameContent').load('./tasks/start.html', function(){
					$('#startBtn').on('click', function(){
						$('#gameModal').modal('show');
					});
				});
				$('.control-container').css('visibility', 'hidden');
				$('#gameModal').on('hidden.bs.modal', function () {
					$(this).off('hidden.bs.modal');
					changeTask();
					showTaskModal();
				})
			} else {
				step = index + 1;
				changeTask();
			}
			return false;
		} else {
			score += +elem;
		}
		if(index === tasks.length - 1){
			setFinishPage();
		}
	});
	$('#condition').on('click', function(){
		showTaskModal();
	});
	$('#helpBtn').on('click', function(){
		showHelpModal();
	});
});

function showTaskModal () {
	$('#gameModalLabel').text('Задача №' + step);
	$('#gameModalBody').html(tasks[step-1].text);
	$('#btnModal').text('Закрыть');
	$('#gameModal').modal('show');
};

function showHelpModal () {
	var template,
		panelGroup = $('#accordion').empty(),
		innerHtml = $(),
		title,
		promptTitle;
	$.each(tasks[step-1].help, function(index, prompt){
		template = $($('#panelTemplate').html());
		template.find('.title').text(refreshTitle(index)).data('index', index);
		if(index >= currentHelp){
			template.find('.panel-heading + div').collapse('hide');
		}
		template.find('.panel-body').text(prompt);
		panelGroup.append(template);
	});
	panelGroup.find('.title').on('click', function(){
		title = $(this);
		if(title.data('index') == currentHelp){
			title.closest('.panel-heading').next().collapse('show');
			currentHelp++;
			$.each(panelGroup.find('.title'), function(index, title){
				$(title).text(refreshTitle(index));
			});
			$('#helpBtn').text('Подсказки (' + (tasks[step-1].help.length - currentHelp) + ')');
			$.ajax({
				method: "POST",
				data: {'prompts': currentHelp }
			});
		}
	});
	$('#helpModal').modal('show');
};

function refreshTitle(index){
	var promptTitle = 'Подсказка № ' + (index + 1);
	if(index === currentHelp){
		promptTitle += ' (-1 балл)';
	}
	if(index > currentHelp){
		promptTitle += ' (недступно)';
	}
	return promptTitle;
}

function showInterimResults () {
	$('#gameModalLabel').text('Промежуточные результаты');
	$('#gameModalBody').html('Текущий результат ' + score + ' балла(ов)');
	$('#btnModal').text('Далее');
	$('#gameModal').modal('show');
	$('#gameModal').on('hidden.bs.modal', function () {
		$(this).off('hidden.bs.modal');
		step++;
		changeTask();
		showTaskModal();
	})
};

function changeTask () {
	$('#logicgameContent').load('./tasks/task' + tasks[step-1].id + '.html', 
		function(){
			$('.control-container').css('visibility', 'visible');
			$('#helpBtn').text('Подсказки (' + (tasks[step-1].help.length - currentHelp) + ')');
			if (tasks[step-1].help.length === 0){
				$('#helpBtn').hide();
			} else {
				$('#helpBtn').show();
			}
			$('.answer').on('click', function(e){
				var isPassed;
					
				isPassed = checkAnswer(e);
				
				if(isPassed){
					scoreForTask = tasks[step-1].help.length + 1;
				} else {
					scoreForTask = pointsForWrongAnswer;
				}
				scoreForTask += (pointsForHelp * currentHelp);
				score += scoreForTask;
				
				$.ajax({
					method: "POST",
					data: { 'step': step-1, 'score': scoreForTask}
				});
				nextStep();
			})
		}
	);
};

function checkAnswer(e){
	var rightAnswer = tasks[step-1].answer,
		answer,
		isPassed = true;
		
	if(typeof(rightAnswer) === "object"){
		answer = $('.answer-select');
		if(rightAnswer.hasOwnProperty('firstPart')){							
			if(rightAnswer.hasOwnProperty('secondPart')){
				if($('.secondPart').val() != rightAnswer.secondPart){
					isPassed = false;
				}
			};
			rightAnswer = rightAnswer.firstPart;
			answer = $('.firstPart');
		}
		$.each(answer, function(index, elem){
			if($(elem).val() != rightAnswer[index]){
				isPassed = false;
			}
		})
	} else {
		answer = $(e.target).data('answer');
		if(parseInt(answer, 10) !== rightAnswer){
			isPassed = false;
		}
	}
	return isPassed;
}

function nextStep(){
	if(step < tasks.length){
		currentHelp = 0;
		$.ajax({
			method: "POST",
			data: {'prompts': currentHelp }
		});
		sessionStorage.setItem('help', 0);
		if(step%tasksCountInGroup === 0){
			showInterimResults();
		} else {
			step++;
			changeTask();
			showTaskModal();
		}
	} else {
		setFinishPage();
	}
}

function setFinishPage(){
	$('.control-container').css('visibility', 'hidden');
		$('#logicgameContent').load('./tasks/end.html', function(){
			$('#total').text('Вы набрали ' + score + ' балла(ов)!')
		});
}

