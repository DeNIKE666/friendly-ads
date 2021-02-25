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
            <div class="card-body">
              <div id="task-form">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Название:</label>
                      <input type="text" class="form-control"
                             placeholder="название вашего проекта в общем списке заданий"
                             @keyup.enter="form.title"
                             v-model.trim="form.title"
                             :class="{ 'is-invalid': form.errors.has('title') }"
                      >
                      <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Период:</label>
                      <select class="form-control"
                              v-model="form.period"
                              :class="{ 'is-invalid': form.errors.has('period') }">
                        <option
                            v-for="period in periods"
                            :value="{price: period.price , day: period.day}">{{ period.text }} - {{ period.price }} руб.
                        </option>
                      </select>
                      <has-error :form="form" field="period"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Бюджет на исполнителя:</label>
                      <input type="text" class="form-control"
                             placeholder="150 руб"
                             @keyup.enter="form.amount"
                             v-model.trim="form.amount"
                             :class="{ 'is-invalid': form.errors.has('amount') }"
                      >
                      <has-error :form="form" field="amount"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Необходимо сайтов</label>
                        <select class="form-control"
                                v-model.trim="form.site_count"
                                :class="{ 'is-invalid': form.errors.has('site_count') }">
                          <option
                              v-for="site in sites"
                              :value="{count: site.count}">{{ site.text }}</option>
                        </select>
                      <has-error :form="form" field="site_count"></has-error>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Краткое описание:</label>
                      <textarea type="text" class="form-control"
                                placeholder="Опишите кратко ваше задание, что-бы с ним можно было ознакомиться"
                                @keyup.enter="form.description"
                                v-model.trim="form.description"
                                :maxlength="maxText"
                                :class="{ 'is-invalid': form.errors.has('description')}"
                      >
                      </textarea>
                      <div class="character" v-if="disabledShort === false">Осталось ввести: {{ maxText - form.description.replace(/[\s\/]/g, '').length}}</div>
                      <has-error :form="form" field="description"></has-error>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Полное описание:</label>
                      <textarea type="text" class="form-control"
                                placeholder="Полное описание задания, это то где вы детельно описываете всю суть"
                                @keyup.enter="form.full_description"
                                v-model.trim="form.full_description"
                                :maxlength="maxText"
                                :class="{ 'is-invalid': form.errors.has('full_description')}"
                      >
                      </textarea>
                      <div class="character" v-if="disabledFull === false">Осталось ввести: {{ maxText - form.full_description.replace(/[\s\/]/g, '').length}}</div>
                      <has-error :form="form" field="full_description"></has-error>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Тип задачи:</label>
                      <select class="form-control"
                              v-model.trim="form.type_task"
                              :class="{ 'is-invalid': form.errors.has('type_task') }">
                        <option
                            v-for="task in type_tasks"
                            :value="{type: task.type, price: task.price}">{{ task.text }} - {{ task.price }} руб. </option>
                      </select>
                      <has-error :form="form" field="type_task"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Позиция:</label>
                      <select class="form-control"
                              v-model.trim="form.type_position"
                              :class="{ 'is-invalid': form.errors.has('type_position') }">
                        <option value="" selected>-- Выберите позицию размещения</option>
                        <option
                            v-for="position in type_positions"
                            :value="{type: position.type , price: position.price}">{{ position.text }} - {{ position.price }} руб. </option>
                      </select>
                      <has-error :form="form" field="type_position"></has-error>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Категории:</label>
                      <select class="form-control"
                              v-model.trim="form.category_id"
                              :class="{ 'is-invalid': form.errors.has('category_id') }">
                        <option
                            v-for="category in categories"
                            :value="category.id">{{ category.name }}</option>
                      </select>
                      <has-error :form="form" field="category_id"></has-error>
                    </div>
                  </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" @click="checkForm" class="btn btn-primary">Добавить задание</button>
                      </div>
                      <span class="float-right price">Общая сумма: <span class="amount">{{ totalSum }}</span> руб. </span>
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
import {Form} from 'vform'

export default {
  props: ['categories'],
  data() {
    return {
      form: new Form({
        title: '',
        amount: '',
        period: '',
        site_count: '',
        description: '',
        full_description: '',
        type_task: '',
        type_position: '',
        category_id: ''
      }),
      maxText : 100,
      disabledShort: false,
      disabledFull: false,
      sum: 100,
      totalSum: 0,
      periods: [
        {day: 1 ,  text: '1 день' , price: 0},
        {day: 2 ,  text: '2 дня', price: 25},
        {day: 3 ,  text: '3 дня', price: 35},
        {day: 7 ,  text: 'Неделя', price: 55},
        {day: 14 , text: 'Две недели', price: 70},
        {day: 30 , text: 'Месяц', price: 100},
      ],
      sites: [
        {count: 1 ,  text: '1 сайт'},
        {count: 2 ,  text: '2 сайта'},
        {count: 3 ,  text: '3 сайта'},
        {count: 4 ,  text: '4 сайта'},
        {count: 5 ,  text: '5 сайтов'},
        {count: 6 ,  text: '6 сайтов'},
        {count: 7 ,  text: '7 сайтов'},
        {count: 8 ,  text: '8 сайтов'},
        {count: 9 ,  text: '9 сайтов'},
        {count: 10 ,  text: '10 сайтов'},
      ],
      type_tasks: [
        {type: "link_product" , text: 'Ссылка на продукт', price: 30},
        {type: "link_video" ,   text: 'Ссылка на видео', price: 50},
      ],
      type_positions: [
        {type: "header" , text: 'В хедере', price: 100},
        {type: "sidebar" ,   text: 'В сайдбаре' , price: 80},
        {type: "content" ,   text: 'В общем контенте', price: 50},
        {type: "footer" ,   text: 'В футере', price: 30},
      ]
    }
  },
  mounted() {
  },
  watch: {
    'form.description'(val) {
      val.length === this.maxText ? this.disabledShort = true : this.disabledShort = false;
    },
    'form.full_description'(val) {
      val.length === this.maxText ? this.disabledFull = true : this.disabledFull = false;
    }
  },
  methods: {
    checkForm: function () {

      let period           = this.form.period.price ?? 0;
      let amount           = this.form.amount;
      let site_count       = this.form.site_count.count ?? 0;

      let type_task        = this.form.type_task.price ?? 0;
      let type_position    = this.form.type_position.price ?? 0;

      if (!amount && !site_count) {
        this.form.errors.set('amount' , 'Введите минимальный бюджет');
        this.form.errors.set('site_count' , 'Выберите кол-во сайтов для размещения');
        return false;
      }

      this.totalSum =  amount * site_count + (period + type_task + type_position )

      this.form.post('/cabinet/tasks').then(({ data }) => {
        window.location.href = '/cabinet/tasks'
      })
    },
   /* calc: function (e) {

      if (! this.form.amount) {
        swal({
          icon: 'error',
          title: 'Ошибка',
          text: 'Сумма не указана, введите сумму',
        });
        this.clear();
        return false;
      }

      this.sum += parseInt(e.target.options[e.target.options.selectedIndex].getAttribute('data-price'));
      this.totalSum = this.sum + parseInt(this.form.amount);

    },*/
    clear: function () {
      this.form.amount = '';
      this.form.period = '';
      this.form.type_task = '';
      this.form.type_position = '';
    }
  }
}
</script>

<style scoped>
    span.price {
      position: relative;
      top: -40px;
      font-size: 18px;
      color: #3e403b;
      border-bottom: 1px solid #797979;
    }
    span.amount {
      font-weight: bold;
      color: #888888;
    }
    .error {
      color: red;
    }

    .character {
      margin-top: 10px;
      font-weight: 500;
    }
</style>