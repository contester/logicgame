var step = 1,
	score = 0,
	pointsForHelp = -1,
	pointsForWrongAnswer = -1,
	scoreForTask = 0,
	currentHelp,
	tasksCountInGroup = 6;
	
$(function(){
	currentHelp = sessionStorage.getItem('help') ? sessionStorage.getItem('help') : 0;
	$.each(window.logicgame_response, function(index, elem){
		if(elem == 0){
			if (index === 0){
				$('#logicgameContent').load('./tasks/start.html');
				$('.control-container').css('visibility', 'hidden');
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
		showTaskModal('Закрыть');
	});
	$('#helpBtn').on('click', function(){
		if (tasks[step-1].help.length > currentHelp) {
			$('#btnModal').off('click');
			showHelpModal();
			currentHelp++;
			sessionStorage.setItem('help', currentHelp);
			$('#helpBtn').text('Подсказки (' + (tasks[step-1].help.length - currentHelp) + ')');
		}
	});
});

function showTaskModal (btnStr) {
	$('#gameModalLabel').text('Задача №' + step);
	$('#gameModalBody').html(tasks[step-1].text);
	$('#btnModal').text(btnStr);
	if (btnStr === 'Далее') {
		$('#btnModal').on('click', function(){
			changeTask();
		});
	} else {
		$('#btnModal').off('click');
	}
	$('#gameModal').modal('show');
};

function showHelpModal () {
	$('#gameModalLabel').text('Подсказка №' + (currentHelp + 1));
	$('#gameModalBody').html(tasks[step-1].help[currentHelp]);
	$('#btnModal').text('Закрыть');
	$('#gameModal').modal('show');
};

function showInterimResults () {
	$('#gameModalLabel').text('Промежуточные результаты');
	$('#gameModalBody').html('Текущий результат ' + score + ' балла(ов)');
	$('#btnModal').text('Далее');
	$('#gameModal').modal('show');
	$('#gameModal').on('hidden.bs.modal', function () {
		$(this).off('hidden.bs.modal');
		step++;
		showTaskModal('Далее');
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
					data: { 'step': step-1, 'score': scoreForTask }
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
		sessionStorage.setItem('help', 0);
		if(step%tasksCountInGroup === 0){
			showInterimResults();
		} else {
			step++;
			showTaskModal('Далее');
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

