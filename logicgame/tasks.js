﻿var tasks = [
{
	id: 1,
	text: '<p>Один странствующий принц попал в волшебный замок. И увидел перед собой две двери. На них были надписи:</p>' + 
	'<p>1 дверь. «По крайней мере за одной из этих дверей находится принцесса.»</p>' + 
	'<p>2 дверь. «Чудовище сидит в другой комнате.»</p>' + 
	'<p>Принц, конечно, немного растерялся, кто знает, можно верить этим надписям или нет. Но тут ему на помощь пришла добрая фея, которая шепнула,' +
	'что во-первых, за одной дверью действительно принцесса, за второй – чудовище, а во-вторых, надписи' + 
	'могут быть одновременно правдой или одновременно ложью.</p>' + 
	'<p>Принц чудовищ не боялся. Но так как он был не только смелым, но еще и умным, то сумел открыть ту дверь, за которой была принцесса,' +
	'и увезти ее с собой. А чудовище как спало, так и спит – если его не трогать, то оно совсем безобидное.</p>' +
	'<p>Так какую дверь открыл принц?</p>',
	answer: 2,
	help: []},
{
	id: 15,
	text: '<p>На острове рыцарей и лжецов рыцари всегда говорят правду, а лжецы всегда лгут. Путешественник встретил двух жителей.</p>' +
	'<p>«По крайней мере, один из нас рыцарь», - сказал первый.</p><p>«Ты лжешь», - ответил второй.</p><p>Кто из них кто?</p>',
	answer: [1, 2],
	help: [
		"Предположим, что первый житель рыцарь - значит, он говорит правду. Тогда второй житель..."
	]},
{
	id: 4,
	text: '<p>Али-баба наткнулся в пещере разбойников на два сундука. Он знает, что в каждом из них могут быть либо сокровища,'+
	' либо сундук взрывается при открывании.</p><p>На первом сундуке написано: «По крайней мере в одном из этих сундуков сокровища»</p>' +
	'<p>На втором сундуке: «Первый сундук взрывается»</p><p>Также известно, что оба утверждения или одновременно истинны или одновременно ложны.</p>' +
	'<p>В каком сундуке находятся сокровища?</p>',
	answer: 2,
	help:[
		"Возможна ли ситуация – оба утверждения ложны?",
		"Пусть оба утверждения истинны, тогда..."
	]},
{
	id: 18,
	text: '<p>В одном государстве все люди или рыцари, или лжецы. Рыцари всегда говорят правду, а лжецы всегда лгут. Однажды в это государство проник шпион.' +
	' Шпион не являлся ни рыцарем, ни лжецом – иногда он говорил правду, иногда лгал. Стало известно, что шпион проживает с двумя местными гражданами,' +
	' один из которых рыцарь, второй – лжец. Полиция арестовала всех троих. В ходе допроса были получены следующие высказывания:</p>' +
	'<p>Первый гражданин: «Третий - лжец»</p><p>Второй гражданин: «Первый - рыцарь»</p><p>Третий гражданин: «Я шпион»</p>' +
	'<p>Кто из них шпион, кто рыцарь, кто лжец?</p>',
	answer: [1, 3, 2],
	help:[
		"Что рыцарь ответит на вопрос «Кто ты?». Что ответит на этот же вопрос лжец и шпион?",
		"Что шпион на вопрос «Кто ты?», если он говорит правду? Что шпион ответит на этот же вопрос, если он лжет?",
		"Пусть шпион соврал, тогда..."
	]},
{
	id: 6,
	text: '<p>На пути к философскому камню Гарри Поттеру нужно пройти через огонь. Чтобы это сделать, необходимо выпить специальное зелье.' +
	' Перед ним три пузырька. В одном из них нужное зелье, в двух других – яд.</p><p>Надпись на первом пузырьке: «Здесь яд»</p>' +
	'<p>Надпись на втором пузырьке: «Здесь зелье»</p><p>Надпись на третьем: «Во втором пузырьке яд»</p><p>Известно, что не более одного' +
	' из этих утверждений истинно.</p><p>Необходимо выяснить, из какого пузырька должен выпить Гарри, чтобы не отравиться, а пройти через огонь.</p>',
	answer: 1,
	help:[
		"Возможна ли ситуация – все утверждения ложны?",
		"Пусть надпись на третьем пузырьке истинна, тогда..."
	]},
{
	id:12,
	text:'<p>На острове живут рыцари, которые всегда говорят правду, лжецы, которые всегда лгут, и хитрецы, которые то лгут, то говорят правду.' +
	' Три островитянина, среди которых рыцарь, лжец и хитрец, произнесли следующие высказывания:</p>' +
	'<p>«Я хитрец»</p><p>«Это правда»</p><p>«Я не хитрец»</p><p>Кто есть кто?</p>',
	answer:[2, 3, 1],
	help: [
		'Кто может сказать про себя «Я не хитрец» и при каких условиях?',
		'Пусть первое высказывание ложно, тогда...'
	]
},


{
	id: 5,
	text: '<p>Али-баба наткнулся в пещере разбойников на два сундука. Он знает, что в каждом из них могут быть либо сокровища,'+
	' либо сундук взрывается при открывании.</p><p>На первом сундуке написано: «По крайней мере, в одном из этих сундуков сокровища»</p>' +
	'<p>На втором сундуке: «В первом сундуке сокровища».</p><p>Кроме того, относительно первого сундука известно, что если там сокровища,' +
	' то надпись на нем истинна, если же он взрывается, то надпись ложна. Относительно второго сундука все наоборот: надпись на нем ложна, ' +
	'если там сокровища и истинна, если он взрывается.</p><p>В каком сундуке находятся сокровища?</p>',
	answer: 1,
	help: []},
{
	id: 13,
	text: '<p>На острове рыцарей и лжецов путешественник встретил четырех жителей, каждый из которых сказал следующее:</p>' +
	'<p>«Все мы лжецы»</p><p>«Среди нас один лжец»</p><p>«Среди нас два лжеца»</p><p>«Я ни разу не соврал и сейчас не вру»</p><p>Кем является четвертый житель?</p>',
	answer: 1,
	help: [
		"Могут ли быть все 4 жителя лжецами?",
		"Среди этих жителей больше двух лжецов",
		"Один из 4ёх жителей говорит правду "
	]},
{
	id: 7,
	text: '<p>На пути к философскому камню Гарри Поттеру нужно пройти через огонь. Чтобы это сделать, необходимо выпить специальное зелье.' +
	' Перед ним три пузырька. В одном из них нужное зелье, в двух других – яд.</p><p>Надпись на первом пузырьке: «Яд во втором пузырьке»</p>' +
	'<p>Надпись на втором пузырьке: «Яд в этом пузырьке»</p><p>Надпись на третьем пузырьке: «Яд в первом пузырьке»</p><p>Известно,'+
	' что надпись на том пузырьке, где находится зелье, истинна, а из двух других по крайней мере одна является ложной.</p>' +
	'<p>Необходимо выяснить, из какого пузырька должен выпить Гарри, чтобы не отравиться, а пройти через огонь.</p>',
	answer: 1,
	help: [
		"Возможна ситуация – два утверждения ложны?",
		"Пусть надпись на третьем пузырьке ложна, тогда..."
	]},
{
	id: 3,
	text: '<p>По дороге в Киев Илья Муромец оказался на распутье трех дорог. На каждой дороге лежал камень с надписью.</p>' +
	'<p>На первом камне было написано: «В Киев ведет вторая дорога».</p><p>На втором: «Эта дорога не ведет в Киев».</p>' +
	'<p>На третьем: «Эта дорога ведет в Киев».</p><p>Наверное, богатырь до сих пор бы чесал в затылке на том распутье,' +
	' если бы пролетающая мимо сорока не шепнула ему, что не более чем одна надпись ложная.</p><p>Так какая дорога ведет в Киев?</p>',
	answer: 3,
	help: [
		"Возможна ситуация – все утверждения истинны?",
		"Пусть надпись на первом камне ложна, тогда..."
	]},
{
	id: 16,
	text: '<p>На острове рыцарей и лжецов перед судом предстали три островитянина Аб, Боб и Вит, один из которых совершил преступление.</p>' +
	'<p>Аб: «Преступление совершил Вит»</p><p>Боб: «Аб и Вит либо оба рыцари, либо оба лжецы»</p><p>Вит: «Боб говорит правду. И он совершил преступление»</p>' +
	'<p>Кто есть кто и кто преступник?</p>',
	answer:{
		firstPart: [1, 2, 2],
		secondPart: 3},
	help: [
		"Возможна ли ситуация: Аб и Вит – рыцари?",
		"Среди этих островитян один рыцарь",
		"Вит – лжец"
	]},
{
	id: 10,
	text: '<p>На пути к философскому камню Гарри Поттеру нужно пройти через огонь. Чтобы это сделать, необходимо выпить специальное зелье.' +
	' Перед ним три пузырька. В одном из них нужное зелье, в двух других – яд.</p><p>На первом пузырьке: «1. Зелье не в этом пузырьке.' +
	' 2. Зелье во втором пузырьке»</p><p>На втором пузырьке: «1. Зелье не в первом пузырьке. 2. Зелье в третьем пузырьке»</p>' +
	'<p>На третьем пузырьке: «1. Зелье не в этом пузырьке. 2. Зелье в первом пузырьке»</p>' +
	'<p>Известно, что на одном пузырьке обе надписи истинны, на другом обе ложны, а на третьем одна истинна, одна ложна.</p>' +
	'<p>Необходимо выяснить, из какого пузырька должен выпить Гарри, чтобы не отравиться, а пройти через огонь.</p>',
	answer: 3,
	help: [
		"Возможна ли ситуация – на втором пузырьке обе записи истинны?",
		"Пусть на первом пузырьке одна надпись истинна, а другая – ложна, тогда..."
	]},


{
	id :11,
	text: '<p>На острове живут рыцари, которые всегда говорят правду, и лжецы, которые всегда лгут. Путешественник встретил трех жителей этого острова,' +
	' и двое из них произнесли следующее:</p><p>«Мы все лжецы»</p><p>«Один из нас рыцарь»</p><p>Кто есть кто?</p>',
	answer: [2, 1, 2],
	help: [
		"Возможна ли ситуация – все жители лжецы?"
	]},
{
	id: 8,
	text: '<p>На пути к философскому камню Гарри Поттеру нужно пройти через огонь. Чтобы это сделать, необходимо выпить специальное зелье.' +
	' Перед ним три пузырька. В одном из них нужное зелье, в двух других – яд.</p><p>На первом пузырьке: «Зелье в этом пузырьке»</p>' +
	'<p>На втором пузырьке: «Зелье не в этом пузырьке»</p><p>На третьей шкатулке: «Зелье не в первом пузырьке»</p>' +
	'<p>Известно, что по крайней мере две надписи ложны.</p>' +
	'<p>Необходимо выяснить, из какого пузырька должен выпить Гарри, чтобы не отравиться, а пройти через огонь.</p>',
	answer: 2,
	help: [
		"Возможна ли ситуация – все утверждения ложны?",
		"Пусть надпись на первом пузырьке является одной из ложных, тогда..."
	]},
{
	id: 14,
	text: '<p>На острове рыцарей и лжецов путешественник встретил пятерых жителей. На его вопрос «Сколько среди вас рыцарей?»' +
	' Один из них ответил «Ни одного», а двое других – «Один».</p><p>Что ответили остальные?</p>',
	answer: 2,
	help: [
		"Возможна ли ситуация – все жители лжецы?",
		"Возможна ли ситуация: только один житель – рыцарь?",
		"Пусть первый житель соврал, тогда..."
	]},
{
	id: 2,
	text: '<p>Имеются три шкатулки.</p><p>На первой написано: «В этой шкатулке яд»</p><p>На второй написано: «В этой шкатулке послание»</p>' +
	'<p>На третьей написано: «Яд в темной шкатулке»</p><p>Известно, что: </p><p>1)	из этих утверждений в лучшем случае только одно истинно,</p>' +
	'<p>2)	послание в одной из шкатулок, в двух других – яд.</p><p>В какой шкатулке находится послание?</p>',
	answer: 1,
	help: [
		"Возможна ли ситуация – все утверждения ложны?",
		"Пусть надпись на третьей шкатулке истинна, тогда..."
	]},
{
	id: 17,
	text: '<p>В некотором государстве живут рыцари, лжецы и фантазеры. Рыцари всегда говорят правду, лжецы всегда врут, фантазеры иногда говорят правду,' +
	' иногда врут, но никогда не врут два раза подряд и никогда не говорят правду два раза подряд. Путешественник, приехавший в этот город, встретил' +
	' сразу трех жителей и спросил кто они?</p><p>Первый сказал: «Я рыцарь»</p><p>Второй сказал: «Я лжец»</p><p>Третий сказал: «Я фантазер»</p>' +
	'<p>После чего первый заявил, что третий лжет, а второй заявил, что первый солгал оба раза. Помогите путешественнику узнать, кто из этих жителей кем является.</p>',
	answer: [2, 3, 3],
	help: [
		"Среди этих трех жителей два фантазера",
		"Возможна ли ситуация – первый житель второй раз солгал?",
		"Пусть второй житель – фантазер, тогда..."
	]},
{
	id: 9,
	text: '<p>На пути к философскому камню Гарри Поттеру нужно пройти через огонь. Чтобы это сделать, необходимо выпить специальное зелье.' +
	' Перед ним три пузырька. В одном из них нужное зелье, в двух других – яд.</p><p>На первом пузырьке: «Зелье не во втором пузырьке»</p>' +
	'<p>На втором пузырьке: «Зелье не в этом пузырьке»</p><p>На третьем пузырьке: «Зелье в этом пузырьке»</p>' +
	'<p>Известно, что по крайней мере одна надпись истинна и по крайней мере одна надпись ложна.</p>' +
	'<p>Необходимо выяснить, из какого пузырька должен выпить Гарри, чтобы не отравиться, а пройти через огонь.</p>',
	answer: 1,
	help: [
		"Возможна ли ситуация – два утверждения истинны?",
		"Пусть надпись на первом пузырьке истинна, тогда..."
	]}
]