function computerChoice() {
    let choices = ['Rock' , 'Paper' , 'Scissors'];
    let computerChoice = choices[Math.floor(Math.random()*3)];
    return computerChoice;
}

function getResult(playerChoice,computerChoice) {
    if(playerChoice === computerChoice) {
        score = 0;
    }
    else if(playerChoice == 'Rock' && computerChoice == 'Scissors') {
        score = 1;
    }
    else if(playerChoice == 'Paper' && computerChoice == 'Rock') {
        score = 1;
    }
    else if(playerChoice == 'Scissors' && computerChoice == 'Paper') {
        score = 1;
    }
    else{
        score = -1;
    }
}

function showResult(score,playerChoice,computerChoice) {
    let result = document.getElementById('result');
    switch(score){
        case -1:
            result.innerText = 'You Lost Game'
            break;
        case 0:
            result.innerText = 'It is a tie'
            break;
        case 1:
            result.innerText = 'You Won Game'
            break;
    }
    let playerScore = document.getElementById('player-score');
    playerScore.innerText = `${Number(playerScore.innerText) + score}`
    let hands = document.getElementById('hands');
    hands.innerText = `👱 ${playerChoice} vs 🤖 ${computerChoice}`
}

function onClickRPS(playerChoice) {
    const computerChoice = getComputerChoice()
    const score = getResult(playerChoice.value, computerChoice)
    showResult(score, playerChoice.value, computerChoice)
}

function playGame() {
    let rpsButtons = document.querySelectorAll('.rpsButton')
    rpsButtons.forEach(rpsButton => {
      rpsButton.onclick = () => onClickRPS(rpsButton)
    } )
   
    let endGameButton = document.getElementById('endGameButton');
    endGameButton.onclick = () => endGame()
    
}

function endGame() {
    let playerScore = document.getElementById('player-score')
    let hands = document.getElementById('hands')
    let result = document.getElementById('result')
    playerScore.innerText = ''
    hands.innerText = ''
    result.innerText = ''
}
  
  playGame()