<template>
  <form id="app" method="post" action="" v-on:submit.prevent="newQuiz($event)">
    <div class="row g-3">
      <div class="col-12">
        <h1>Create a Quiz!</h1>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Quiz
          </div>
          <div class="card-body">
            <label class="mb-2" for="inputQuizTitle">Title</label>
            <input type="text" name="quizTitle" id="inputQuizTitle" class="form-control" required autofocus
                   v-model="inputQuizTitle">
          </div>
        </div>
      </div>

      <question-component v-for="(question, index) in questions" :key="question.id" :question="question"
                          @delete="deleteQuestion(index)"></question-component>

      <div class="col-12">
        <a v-on:click.prevent="onClickAddQuestion" href="#" class="link-primary text-decoration-none"><i
            class="bi bi-plus-circle-fill"></i> Add new question</a>
      </div>
      <div class="col-12">
        <button class="btn btn-lg btn-success" type="submit">Create</button>
      </div>
    </div>
  </form>
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