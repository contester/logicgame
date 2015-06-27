/***
 *** General styles (scope: all of game)
 ***/

<?php
include "bootstrap.php"
?>

.mod-logicgame p{
	text-indent: 20px;
}

.mod-logicgame a{
	cursor: pointer;
}

.mod-logicgame .logicgame-frame{
	position:relative;
	width: 800px;
	height: 457px;
	margin: 50px auto 0px;
	border: 3px solid black;
}

.mod-logicgame .inherit-size{
	width: inherit;
	height: inherit;
}

.mod-logicgame .modal-dialog{
	margin-top: 100px;
}

.mod-logicgame .start-page{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/start.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .start-page .btn-container{
	top: 210px;
}

.mod-logicgame .end-page #total{
	top: 215px;
	font-family: cursive;
	font-size: 22px;
}

.mod-logicgame .end-page{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/end.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .control{
	display: block;
	margin: 25px 0;
}

.mod-logicgame .control-container{
	position: absolute;
	right: 15px;
	z-index: 1;
}

.mod-logicgame .answer{
	cursor: pointer;
}

.mod-logicgame .absolute-center{
	position: absolute;
	width: 100%;
	text-align: center;
}

.mod-logicgame .question{
	bottom: 5px;
	font-weight: 600;
}

.mod-logicgame .condition-text{
	padding: 15px;
	color: black;
}

.mod-logicgame select{
	width: 200px;
}

.mod-logicgame .text-sm{
	font-size: 13px;
}

.mod-logicgame .inline-form select {
	display: inline-block;
	margin-left: 10px;
}

.mod-logicgame .answer-container {
	position: absolute;
	right: 15px;
	bottom: 60px;
	text-align: right;
}

.mod-logicgame .phrase{
	position: absolute;
	text-align: center;
	width: 150px;
}

/*styles for task about doors*/

.mod-logicgame .page-doors{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/doors.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .page-doors .answer{
	width: 195px;
	height: 299px;
	position: absolute;
	text-align: center;
}

.mod-logicgame .page-doors .answer[data-answer="1"]{
	top:118px;
	left:65px;
}

.mod-logicgame .page-doors .answer[data-answer="2"]{
	top:118px;
	left:390px;
}

.mod-logicgame .page-doors .answer .condition-text{
	margin-top: 120px;
	color: wheat;
}

/*styles for task 2*/

.mod-logicgame .page-2 .answer{
	position: absolute;
	text-align: center;
}

.mod-logicgame .page-2 .answer[data-answer="1"]{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/box1.png");
	width:264px;
	height:176px;
	top:72px;
	left:56px;
}

.mod-logicgame .page-2 .answer[data-answer="3"]{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/box2.png");
	width:226px;
	height:134px;
	top:233px;
	left:96px;
}

.mod-logicgame .page-2 .answer[data-answer="2"]{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/box3.png");
	width:162px;
	height:215px;
	top:100px;
	left:340px;
}

.mod-logicgame .page-2 .answer .condition-text{
	margin-top: 27px;
	color: white;
}

/*styles for task 3*/

.mod-logicgame .page-3{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/muromec.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .page-3 .answer{
	width: 90px;
	position: absolute;
	text-align: center;
}

.mod-logicgame .page-3 .answer[data-answer="1"]{
	top: 135px;
	left: 412px;
}

.mod-logicgame .page-3 .answer[data-answer="2"]{
	top: 42px;
	left: 477px;
}

.mod-logicgame .page-3 .answer[data-answer="3"]{
	top: 162px;
	left: 501px;
}

/*styles for task about ali-baba*/

.mod-logicgame .page-4 .answer{
	position: absolute;
	text-align: center;
	width:255px;
	height:244px;
}

.mod-logicgame .page-4 .answer[data-answer="1"]{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/sunduk2.png");
	top:135px;
	left:36px;
}

.mod-logicgame .page-4 .answer[data-answer="2"]{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/sunduk1.png");
	top:135px;
	left:360px;
}

.mod-logicgame .page-4 .answer .condition-text{
	margin-top: -40px;
}

/*styles for task about harry potter*/

.mod-logicgame .page-bulbs{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/bulbs.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .page-bulbs .answer{
	position: absolute;
	text-align: center;
}

.mod-logicgame .page-bulbs .answer[data-answer="1"]{
	width:200px;
	height:290px;
	top:60px;
	left:32px;
}

.mod-logicgame .page-bulbs .answer[data-answer="2"]{
	width: 215px;
	height: 310px;
	top: 100px;
	left: 200px;
}

.mod-logicgame .page-bulbs .answer[data-answer="3"]{
	width: 194px;
	height: 295px;
	top: 48px;
	left: 377px;
}

.mod-logicgame .page-bulbs .answer .condition-text{
	margin-top: -45px;
	padding:10px 0px 10px 10px;
}

/*styles for tasks about 3 knights*/

.mod-logicgame .page-knight3{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/knight3.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .page-knight3 .phrase-1{
	top: 90px;
}

.mod-logicgame .page-knight3 .phrase-2{
	top: 47px;
	left: 119px;
}

.mod-logicgame .page-knight3 .phrase-3{
	top: 60px;
	left: 360px;
}

/*styles for tasks about 2 knights*/

.mod-logicgame .page-knight2{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/knight2.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .page-knight2 .phrase-1{
	top: 40px;
	left: 20px;
}

.mod-logicgame .page-knight2 .phrase-2{
	top: 40px;
	left: 390px;
}

/*styles for tasks about 4-5 knights*/

.mod-logicgame .page-knight5{
	background-image: url("<?php echo $CFG->httpswwwroot ?>/mod/logicgame/img/knight5.jpeg");
	background-size: cover;
	position: relative;
}

.mod-logicgame .page-knight5 .phrase-1{
	top: 126px;
	left: -19px;
}

.mod-logicgame .page-knight5 .phrase-2{
	top: 89px;
	left: 45px;
}

.mod-logicgame .page-knight5 .phrase-3{
	top: 50px;
	left: 124px;
}

.mod-logicgame .page-knight5 .phrase-4{
	top: 40px;
	left: 270px;
}