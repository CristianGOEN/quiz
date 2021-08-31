<template>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        New question
      </div>
      <div class="card-body">
        <div class="row g-2">
          <div class="col-12">
            <label class="mb-2" :for="'inputQuestionText-' + question.id">Text</label>
            <input type="text" :name="'questionText-' + question.id" :id="'inputQuestionText-' + question.id" class="form-control">
          </div>
          <div class="col-12" v-for="index in 4" :key="index">
            <div class="row">
              <div class="col-8">
                <label class="mb-2" :for="'inputAnswerText-' + question.id + '-' + index">Option {{ index }}</label>
                <input type="text" :name="'answerText-' + question.id + '-' + index" :id="'inputAnswerText-' + question.id + '-' + index"
                       class="form-control form-control-sm">
              </div>
              <div class="col-4 align-self-end">
                <div class="form-check">
                  <input type="hidden" :name="'correct-' + question.id + '-' + index" value=0>
                  <input class="form-check-input" type="checkbox" :id="'inputCorrectAnswer' + question.id + '-' + index"
                         :name="'correct-' + question.id + '-' + index" value=1>
                  <label class="form-check-label" :for="'inputCorrectAnswer' + question.id + '-' + index">
                    Is correct?
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-danger" v-on:click="onClickDelete()">Remove</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['question'],
  methods: {
    onClickDelete(){
      this.$emit('delete');
    }
  }
}
</script>