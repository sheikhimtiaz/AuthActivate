function Question(text, choices, answer) {
    this.text = text;
    this.choices = choices;
    this.answer = answer;
}

Question.prototype.isCorrectAnswer = function(choice) {
    return this.answer === choice;
}


function Quiz(questions) {
    this.score = 0;
    this.questions = questions;
    this.questionIndex = 0;
}

Quiz.prototype.getQuestionIndex = function() {
    return this.questions[this.questionIndex];
}

Quiz.prototype.guess = function(answer) {
    //alert(this.getQuestionIndex());
    if(this.getQuestionIndex().isCorrectAnswer(answer)) {
        this.score++;
    }

    this.questionIndex++;
}

Quiz.prototype.isEnded = function() {
    return this.questionIndex === this.questions.length;
}

function populate() {
    if(quiz.isEnded()) {
        showScores();
    }
    else {
        // show question
        var element = document.getElementById("question");
        element.innerHTML = quiz.getQuestionIndex().text;

        // show options
        var choices = quiz.getQuestionIndex().choices;
        for(var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            element.innerHTML = choices[i];
            guess("btn" + i, choices[i]);
        }

        showProgress();
    }
};

function guess(id, guess) {
    var button = document.getElementById(id);
    button.onclick = function() {
        quiz.guess(guess);
        populate();
    }
};


function showProgress() {
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;
};
var houses = ["Stark","Targaryen", "Lannister","Greyjoy", "Baratheon", "Tyrell", "Martell", "Frey", "Clegane", "Mormont"];
var houseImages = ["01-stark.jpg", "02-targaryen.jpg", "03-lannister.jpg", "04-greyjoy.jpg", "05-baratheon.jpg", "06-tyrell.jpg", "07-martell.jpg", "08-frey.jpg", "09-clegane.jpg", "11-mormont.jpg"];
function showScores() {
    // var gameOverHTML = "<h1>Congratulations! You are a ";
    //
    // var winIndex = -1;
    // if(quiz.score>8) {
    //     // gameOverHTML += "Stark";
    //     winIndex = 0;
    // }
    // else if(quiz.score<=8&&quiz.score>5) {
    //     // gameOverHTML += "Lannister";
    //     winIndex = 1;
    // }
    // else if(quiz.score<=5&&quiz.score>2) {
    //     // gameOverHTML += "Targaryen";
    //     winIndex = 2;
    // }
    // else {
    //     // gameOverHTML += "Greyjoy";
    //     winIndex = 3;
    // }
    //
    // gameOverHTML += "</h1>" + "<h2 id='score'> Your scores: " + quiz.score + "</h2>";
    // alert(gameOverHTML);
    // var element = document.getElementById("quiz");
    // element.innerHTML = gameOverHTML;
    if(quiz.score<=0)
        quiz.score = 1;
    var winInd = (10 - quiz.score);
    showResultsWithFbId(houses[winInd], houseImages[winInd], winInd);
};

// create questions
var questions = [
    new Question("Which season would you eliminate?", ["Summer", "Spring","Autumn", "Winter"],"Winter"),
    new Question("Who shall inherit the Earth?", ["THE MEEK", "THE WARRIORS", "THE DIPLOMATS", "WHITE-WALKERS"],"sth"),
    new Question("Which fairy tell do you empathize the most?", ["Wizard", "Evil Queen","Rogue", "Talking Animal"],"sth"),
    new Question("What shall be a King's priority?", ["ARMY", "WEALTH", "EDUCATION", "FAMILY"],"EDUCATION"),
    new Question("What do you value most?", ["KNOWLEDGE", "MONEY", "POWER", "LOVE"],"LOVE"),
    new Question("Never use two words when you can - ?", ["Use one word", "Resort to violence instead","Not say anything", "Let someone else say it"],"Resort to violence instead"),
    new Question("Who is your favorite family member?", ["Siblings", "Spouse", "Kids", "I don't have a favorite"],"Siblings"),
    new Question("People say, Forgive & Forget. What do you say?", ["Forgive but never forget", "Never forgive, Never forget", "Pretend to forgive and then annihilate", "That's also what I say"],"Pretend to forgive and then annihilate"),
    new Question("Which castle would you live in?", ["HARRENHAL", "RED KEEP", "THE EYRIE", "DRAGONSTONE"],"sth"),
    new Question("Choose one - ", ["High-born & Sea", "High-born & Land", "Low-born & Sea", "Low-born & Land"],"sth")

];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();
