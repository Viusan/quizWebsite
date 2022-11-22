<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="bilder/quizLogo.png">
  <title>Quiz</title>
</head>
<body id="quizBody">
  <?php
    include_once 'header.php';
  ?>
  <div class="quiz-container" id="quiz">
    <div class="centerDiv">
      <div class="quiz-header">
        <h2 id="question">Question Text</h2>
        <ul>
          <li>
            <input type="radio" name="answer" id="a" class="answer">
            <label for="a" id="a_text">Answer</label>
          </li>

          <li>
            <input type="radio" name="answer" id="b" class="answer">
            <label for="b" id="b_text">Answer</label>
          </li>

          <li>
            <input type="radio" name="answer" id="c" class="answer">
            <label for="c" id="c_text">Answer</label>
          </li>

          <li>
            <input type="radio" name="answer" id="d" class="answer">
            <label for="d" id="d_text">Answer</label>
          </li>
        </ul>
      </div>
    </div>
    

    <button id="submit">Submit</button>
    
  </div>

  <script>
    const quizData = [
    {
      question: "Hva blir du når du lærer deg PHP?",
      a: "Koder",
      b: "Taper",
      c: "Sanchay",
      d: "Kriger",
      correct: "d",
    },
    {
      question: "Armand..",
      a: "Clock",
      b: "Klokk",
      c: "Rust",
      d: "Thayananthan",
      correct: "b",
    },
    {
      question: "ABC..",
      a: "D",
      b: "G",
      c: "Z",
      d: "O",
      correct: "a",
    },
    {
      question: "CSS er for..",
      a: "Barn",
      b: "Inteligente Mennesker",
      c: "Alle",
      d: "f(x) = 2x+1",
      correct: "b",
    },
    {
      question: "Når starter vinter?",
      a: "November",
      b: "Desember",
      c: "Januar",
      d: "Februar",
      correct: "b",
    },
  ];

  const quiz = document.getElementById('quiz');
  const answerEls = document.querySelectorAll('.answer')
  const questionEl = document.getElementById('question')
  const a_text = document.getElementById('a_text')
  const b_text = document.getElementById('b_text')
  const c_text = document.getElementById('c_text')
  const d_text = document.getElementById('d_text')
  const submitBtn = document.getElementById('submit')

  let currentQuiz = 0
  let score = 0

  loadQuiz()

  function loadQuiz(){
    deselectAnswers()
    const currentQuizData = quizData[currentQuiz]

    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
  }

  function deselectAnswers(){
    answerEls.forEach(answerEl => answerEl.checked = false)
  }

  function getSelected(){
    let answer
    answerEls.forEach(answerEl => {
      if(answerEl.checked) {
        answer = answerEl.id
      }
    })
    return answer
  }

  submitBtn.addEventListener("click", () => {
    const answer = getSelected()
    if (answer){
      if(answer == quizData[currentQuiz].correct) {
        score++
      }
      currentQuiz++
      if(currentQuiz < quizData.length){
        loadQuiz()
      }else {
        if(score >= 4){
          quiz.innerHTML = `
          <h2 style="color: #ffe9b1">You answered ${score}/${quizData.length} questions correctly</h2>
          <div class="continueCompleteDiv">
            <form method="POST" name="nextPage" action="includes/updatelevel.php">
              <input class="resultButtons" type="submit" name="levelComplete" value="Homepage">
              <input type="hidden" value="1" name="levelvalue">
              <input class="resultButtons" type="submit" name="nextLevel" value="Next quiz">
              </form>
          </div>
          `
        }else{
          quiz.innerHTML = `
          <h2 style="color: #ffe9b1">You answered ${score}/${quizData.length} questions correctly</h2>
          <div>
            <button class="resultButtons" onclick="location.href='homepage.php'">Homepage</button>
            <button class="resultButtons" onclick="location.reload()">Reload</button>
          </div>
          `
        }
      }
    }
  })
  </script>
</body>
</html>

