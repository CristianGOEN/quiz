<template>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">{{ quiz.title }}</h3>
        <a href="#" class="btn btn-primary">Start</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      inputQuizTitle: '',
      count: 1,
      questions: [{'id': 0}]
    }
  },
  methods: {
    newQuiz(event) {

      let quizArray = {
        id: this.$uuid.v4(),
        title: this.inputQuizTitle,
        questions: []
      };

      const formData = new FormData(event.target)
      const formArray = [];

      for (const [inputName, value] of formData) {
        formArray[inputName] = value;
      }

      for (let question of this.questions) {
        quizArray.questions.push({
          id: this.$uuid.v4(),
          text: formArray['questionText-' + question.id],
          answers: [
            {
              id: this.$uuid.v4(),
              text: formArray['answerText-' + question.id + '-1'],
              correct: formArray['correct-' + question.id + '-1']
            },
            {
              id: this.$uuid.v4(),
              text: formArray['answerText-' + question.id + '-2'],
              correct: formArray['correct-' + question.id + '-2']
            },
            {
              id: this.$uuid.v4(),
              text: formArray['answerText-' + question.id + '-3'],
              correct: formArray['correct-' + question.id + '-3']
            },
            {
              id: this.$uuid.v4(),
              text: formArray['answerText-' + question.id + '-4'],
              correct: formArray['correct-' + question.id + '-4']
            }
          ]
        });
      }

      this.$http.post('/quiz', quizArray).then((response) => console.log(response));
    },
    onClickAddQuestion() {
      this.questions.push({'id': this.count++})
    },
    deleteQuestion(index) {
      this.questions.splice(index, 1);
    }
  }
}
</script>