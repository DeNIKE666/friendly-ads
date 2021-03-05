<template>
  <div>
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">Добавление задачи</h2>
            <h5 class="text-white op-7 mb-2">Создайте новую задачу в общий список</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="page-inner mt--5">
      <div class="d-flex justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body"  :class="{'is-loading loader-primary' : loading === true}">
              <div class="card-header">
                <p>Общая стоимость: <b>{{ total }} </b> руб. </p>
              </div>
              <div id="task-form">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Наименование</label>
                      <input type="text"
                             name="title"
                             class="form-control"
                             v-model="options.title"
                             v-validate="'required'"
                             id="title"
                             placeholder="Придумайте название задачи">
                      <div class="w-100 pt-2">
                        <p class="text-danger text-muted">{{ errors.first('title') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Тип задания</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item" v-for="task in tasks">
                          <input
                              @change="taskPrice(task.price)" type="radio"
                              v-model="options.type_task"
                              v-validate="'required'"
                              :value="task.type"
                              name="task"
                              class="selectgroup-input">
                          <span class="selectgroup-button"><i v-show="task.icon" :class="task.icon"></i> {{ task.name }} - {{ task.price }} руб. </span>
                        </label>
                      </div>
                      <div class="w-100">
                        <p class="text-danger text-muted">{{ errors.first('task') }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Период</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item" v-for="period in periods">
                          <input @change="periodPrice(period.price)" type="radio"
                                 v-model="options.period"
                                 v-validate="'required'"
                                 :value="period.day"
                                 name="period"
                                 class="selectgroup-input">
                          <span class="selectgroup-button">{{ period.name }} - {{ period.price }} руб.</span>
                        </label>
                      </div>
                      <div class="w-100">
                        <p class="text-danger text-muted">{{ errors.first('period') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Позиция размещения</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item" v-for="position in positions">
                          <input @change="positionPrice(position.price)" type="radio"
                                 v-model="options.type_position"
                                 v-validate="'required'"
                                 :value="position.type"
                                 name="position"
                                 class="selectgroup-input">
                          <span class="selectgroup-button"><i v-show="position.icon" :class="position.icon"></i> {{ position.name }} - {{ position.price }} руб.</span>
                        </label>
                      </div>
                      <div class="w-100">
                        <p class="text-danger text-muted">{{ errors.first('position') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-label" for="amount">Мой бюджет</label>
                      <input type="text"
                             name="amount"
                             class="form-control"
                             v-model="options.amount"
                             v-validate="'required'"
                             id="amount"
                             placeholder="599 руб">
                      <div class="w-100 pt-2">
                        <p class="text-danger text-muted">{{ errors.first('amount') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-label" for="sites">Кол-во сайтов</label>
                      <input type="text"
                             name="sites"
                             class="form-control"
                             v-model="options.site_count"
                             v-validate="'required'"
                             id="sites"
                             placeholder="10"
                      >
                      <div class="w-100 pt-2">
                        <p class="text-danger text-muted">{{ errors.first('sites') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <button @click="calc" class="btn btn-outline-info w-100 calc-btn">Расчитать стоимость</button>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Краткое описание:</label>
                      <textarea type="text"
                                @input="check"
                                class="form-control"
                                name="description"
                                rows="5"
                                placeholder="Опишите кратко ваше задание, что-бы с ним можно было ознакомиться"
                                v-model="options.description"
                                v-validate="'required'"
                      >
                      </textarea>
                      <p class="pt-3" :class="{help: true, 'text-danger': remainingShort === 0}">{{ instructionShort }}</p>
                      <div class="w-100 pt-2">
                        <p class="text-danger text-muted">{{ errors.first('description') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Полное описание:</label>
                      <textarea type="text"
                                @input="check"
                                class="form-control"
                                name="full_description"
                                rows="5"
                                placeholder="Полное описание задания, это то где вы детельно описываете всю суть"
                                v-model="options.full_description"
                                v-validate="'required'"
                      >
                      </textarea>
                      <p class="pt-3" :class="{help: true , 'text-danger': remainingFull === 0}">{{ instructionFull }}</p>
                      <div class="w-100">
                        <p class="text-danger text-muted">{{ errors.first('full_description') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="category">Выбор категории:</label>
                      <select class="form-control input-square"
                              name="category"
                              id="category"
                              v-model="options.category_id"
                              v-validate="'required'">
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                          {{ category.name }}
                        </option>
                      </select>
                      <div class="w-100">
                        <p class="text-danger text-muted">{{ errors.first('category') }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <button class="btn btn-outline-dark" @click="validateForm">Создать задание</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import customMessage from './../../validate'

export default {
  props: ['categories'],
  data: () => ({
    options: {
      title: '',
      period: '',
      type_task: '',
      type_position: '',
      site_count : 1,
      amount : 100,
      description: '',
      full_description: '',
      category_id: '',
      sum_pay: 0,
      prices: {}
    },
    loading: false,
    total: 0,
    maxText : 300,
    periods: [
      {name: '1 день' , day: 1, price: 0},
      {name: '2 дня' ,  day: 2, price: 0},
      {name: '3 дня' ,  day: 3, price: 0}
    ],
    tasks: [
      {name: 'Ссылка' , type: 'link' , icon: 'fal fa-link' , price: 50},
      {name: 'Видео' , type: 'video' , icon: 'fal fa-camera-movie', price: 80}
    ],
    positions: [
      {name: 'В шапке' , type: 'header', icon: 'fal fa-chevron-up', price: 30},
      {name: 'В футере' ,  type: 'footer', icon: 'fal fa-chevron-down', price: 25 },
      {name: 'В дугом месте' ,  type: 'custom' , icon: 'fal fa-question-square', price: 10}
    ],
  }),
  computed: {
    // Введенные символы в краткое описание
    instructionShort: function() {
      return this.options.description === ''?
          'Лимит: '+ this.maxText+' символов':
          'Осталось '+this.remainingShort+' символов';
    },
    instructionFull: function() {
      return this.options.full_description === ''?
          'Лимит: '+ this.maxText+' символов':
          'Осталось '+this.remainingFull+' символов';
    },
    // Введенные символы в полное описание
    remainingShort: function() {
      return this.maxText - this.options.description.length;
    },
    remainingFull: function () {
      return this.maxText - this.options.full_description.length;
    }
  },
  mounted() {
    this.$validator.localize('ru', customMessage);
  },
  methods: {
    // Проверка на введенные символы
    check: function() {
      this.options.description = this.options.description.substr(0, this.maxText)
      this.options.full_description = this.options.full_description.substr(0, this.maxText)
    },
    periodPrice(price) {
      this.options.prices.period = price;
    },
    taskPrice(price) {
      this.options.prices.type_task = price;
    },
    positionPrice(price) {
      this.options.prices.type_position = price;
    },
    calc() {
      let amount           = this.options.amount     = parseInt(this.options.amount);
      let siteCount        = this.options.site_count = parseInt(this.options.site_count);
      this.total           = (this.options.prices.period + this.options.prices.type_task + this.options.prices.type_position) + amount * siteCount;
      this.options.sum_pay = this.total;
    },
    validateForm() {

      this.calc();

      this.$validator.validate().then((result) => {

        if (result) {
          this.loading = true;
          axios.post('/cabinet/tasks',this.options).then(res => {
            window.location.href = '/cabinet/tasks';
          }).catch(res => {
            console.log(res)
          });

          setTimeout(() => {
            this.loading = false;
          }, 1000);

        }
      });
    }
  }
}
</script>

<style scoped>
     .check {
       border: 1px solid #8e8e8e7d;
       background: #dfe4e1;
     }
     .calc-btn {
       margin-top: 26px;
     }
</style>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>