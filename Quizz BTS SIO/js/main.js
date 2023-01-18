// DOM => Document Object Model


 
const els = {
    welcomeScreen: null,
    questionScreen: null,
    endScreen: null,
    welcomeBtn: null,
    answers: null,
    endBtn: null,
    answersContainer: null
};
 
let questionIndex = 0;
 
const questions = [{
        question: 'Quelle est ta matiére préféré ?',
        answers: [{
            title: 'Math',
            house: 'SLAM'
        }, {
            title: 'Sciences de la vie et de la Terre',
            house: 'SISR'
        }, {
            title: '...',
            house: 'SISR'
        }, {
            title: '...',
            house: 'SLAM'
        }]
    },
    {
        question: 'Quelle est ton film preferer ?',
        answers: [{
            title: '...t',
            house: 'SISR'
        }, {
            title: '...',
            house: 'SISR'
        }, {
            title: '...',
            house: 'SISR'
        }, {
            title: '...',
            house: 'SLAM'
        }]
    },
    {
        question: '*********?',
        answers: [{
            title: '...',
            house: 'SLAM'
        }, {
            title: '....',
            house: 'SLAM'
        }, {
            title: '....',
            house: 'SISR'
        }, {
            title: 'aaa',
            house: 'sisr'

        }]
    }
];

const recordedAnswers = [];


const init = () => {
    console.log('Page has loaded');

    els.welcomeScreen = document.querySelector('.welcome-screen');
    els.questionScreen = document.querySelector('.question-screen');
    els.endScreen = document.querySelector('.end-screen');
    els.welcomeBtn = els.welcomeScreen.querySelector('button');
    els.endBtn = els.endScreen.querySelector('button');
    els.answersContainer = els.questionScreen.querySelector('ul');

    els.welcomeBtn.addEventListener('click', () => {
        displayScreen('question');
        displayQuestion(questionIndex);
    });
    els.endBtn.addEventListener('click', () => {
        displayScreen('welcome');
        questionIndex = 0;
    });

    els.answersContainer.addEventListener('click', ({ target }) => {
        if (target.tagName !== 'LI') {
            return;
        }
        const house = target.getAttribute('data-house');
        recordedAnswers.push(house);

        questionIndex++;

        if (questionIndex >= questions.length) {
            calculateScore();
            displayScreen('end');
        } else {
            displayQuestion(questionIndex);
        }
    });

};

const calculateScore = () => {
    const house = recordedAnswers.sort((a, b) => {
        return recordedAnswers.filter(answer => answer === a).length - 
        recordedAnswers.filter(answer => answer === b).length 
    }).pop();
    // console.log('house', house);

    const houseInFrench = {
        SISR: 'SISR',
        SLAM: 'SLAM'
    };

    els.endScreen.querySelector('span').textContent = houseInFrench[house];
};

const displayQuestion = (index) => {

    const currentQuestion = questions[index];

    const questionEl = els.questionScreen.querySelector('h2');

    const answerEls = currentQuestion.answers.map((answer) => {
        const liEl = document.createElement('li');
        liEl.textContent = answer.title;
        liEl.setAttribute('data-house', answer.house);
        return liEl;
    });

    questionEl.textContent = currentQuestion.question;
    els.answersContainer.textContent = '';
    els.answersContainer.append(...answerEls);
};

const displayScreen = (screenName) => {
    // console.log('screenName', screenName);
    els.welcomeScreen.style.display = 'none';
    els.questionScreen.style.display = 'none';
    els.endScreen.style.display = 'none';

    const screen = els[screenName + 'Screen'];
    // console.log('screen', screen);
    screen.style.display = 'flex';
};


window.addEventListener('load', init);

    