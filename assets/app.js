/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/global.scss';

// start the Stimulus application
import './bootstrap';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

import Vue from 'vue';
import Axios from 'axios';
import UUID from "vue-uuid";

Vue.prototype.$http = Axios;
Vue.use(UUID);

import QuestionComponent from './components/QuestionComponent.vue';
import FormQuizComponent from './components/FormQuizComponent';

Vue.component('question-component', QuestionComponent);
Vue.component('form-quiz-component', FormQuizComponent);

new Vue({
    el: '#app'
});