//select all elements
const start= document.getElementById("start");
const leader=document.getElementById("leader");
const leaderboard=document.getElementById("leaderboard");
const level=document.getElementById("levelchoice");
const easy=document.getElementById("easy");
const medium=document.getElementById("medium");
const hard=document.getElementById("hard");
const quiz= document.getElementById("quiz");
const question= document.getElementById("question"); 
const choiceA= document.getElementById("A");
const choiceB= document.getElementById("B");
const choiceC= document.getElementById("C");
const choiceD= document.getElementById("D");
const counter= document.getElementById("counter");
const btimeGauge=document.getElementById("btimeGauge");
const timeGauge= document.getElementById("timeGauge");
const progress= document.getElementById("progress");
const scoreDiv= document.getElementById("scoreContainer");
//create our questions
/*let questions=[
    {question:"What is it",
     choiceA:"Wrong",
     choiceB:"Right",
     choiceC:"Wrong",
     choiceD:"Wrong",
     correct:"B"
    },
    {
      question:"What is it",
     choiceA:"Wrong",
     choiceB:"Right",
     choiceC:"Wrong",
     choiceD:"Wrong" ,
    correct:"B"
    },
    {
       question:"What is it",
     choiceA:"Wrong",
     choiceB:"Right",
     choiceC:"Wrong",
     choiceD:"Wrong",
        correct:"B"
    }
];*/

// create some varibales
let runningQuestion=0;
let TIMER=0;
let count=0;
let score=0;
const questionTime=10;
const gaugeWidth=250;
const gaugeUnit=gaugeWidth / questionTime;
start.addEventListener("click",startQuiz);
leader.addEventListener("click",renderLeaderboard);
easy.addEventListener("click",function(){
    level.style.display='none';
    quizstart();
},false);
medium.addEventListener("click",function(){
     level.style.display='none';
    quizstart();
},false);
hard.addEventListener("click",function(){
     level.style.display='none';
    quizstart();
},false);
//start quiz
function startQuiz(){
  start.style.display="none";
    leader.style.display="none";
levelchoice();

}
//choice level
function levelchoice(){
    level.style.display="block";
    
    }
function quizstart(a){
    renderQuestion();
    quiz.style.display="block";
renderProgress();
renderCounter();
TIMER=setInterval(renderCounter,1000);  
}
//render a question
function renderQuestion(){
    let q=questions[runningQuestion];
    question.innerHTML="<p>"+q.question+"</p>";
    choiceA.innerHTML=q.choiceA;
     choiceB.innerHTML=q.choiceB; choiceC.innerHTML=q.choiceC;
     choiceD.innerHTML=q.choiceD;
    }
// render progress
function renderProgress(){
    for(let qIndex=0;qIndex<=lastQuestion;qIndex++)
        {
            progress.innerHTML+="<div class='prog' id="+qIndex+"></div>";
        }
   
}
//counter render
function renderCounter(){
    if(count<=questionTime){
        counter.innerHTML=count;
        timeGauge.style.width=count * gaugeUnit +"px";
        count++;
    }
    else
    {count=0;
        answerIsWrong();
        if(runningQuestion<lastQuestion){
       runningQuestion++;
    renderQuestion();
    }else
    {
        //show the score
       clearInterval(TIMER);
        scoreRenderer();
    }  
    }
    
}
//checkAnswer
function checkAnswer(answer){
    if(answer==questions[runningQuestion].correct){
        score++;
        //change progress color to green
        answerIsCorrect();
    }
    else{
     //answer is wrong 
    //change progress color to red
        answerIsWrong();
    }
    count=0;
    if(runningQuestion<lastQuestion){
        runningQuestion++;
        renderQuestion();
    }else{
        //show the score
        clearInterval(TIMER);
        scoreRenderer();
    }
}
function answerIsCorrect(){
    document.getElementById(runningQuestion).style.backgroundColor="#0f0";
}
function answerIsWrong(){
    document.getElementById(runningQuestion).style.backgroundColor="#f00";
}
function scoreRenderer(){
    scoreDiv.style.display="block";
    //caculate the score percent
    const scorePercent=Math.round(100*score/questions.length);
    let img=(scorePercent>=80)? "pictures/5.png":
            (scorePercent>=60)? "pictures/4.png":
            (scorePercent>=40)? "pictures/3.png":
            (scorePercent>=20)? "pictures/2.png":
            "pictures/1.png";
    scoreDiv.innerHTML="<img src="+img+">";
    scoreDiv.innerHTML+="<p>"+scorePercent+"%</p>";
    scoreDiv.innerHTML+="<button id='playagain' onclick='pagerefresh()'>Play Again</button>";
    scoreDiv.innerHTML+="<button id='lead' onclick='renderLeaderboard()'>See the LeaderBoard</button>";
    scoreDiv.innerHTML+="<small id='alert'onclick='formToggle()'>Sign in to get leaderboard access</small>";
}
function renderLeaderboard(){
    start.style.display="none";
    leader.style.display="none";
    scoreDiv.style.display="none";
    question.style.display="none";
    progress.style.display="none";
    counter.style.display="none";
    choiceA.style.display="none";
    choiceB.style.display="none";
    choiceC.style.display="none";
    choiceD.style.display="none";
    timeGauge.style.display="none";
    btimeGauge.style.display="none";
    leaderboard.style.display="block";
}
function backtomenu(){
  pagerefresh();
}
function pagerefresh(){
    window.location.href="gamecorner.php";
}