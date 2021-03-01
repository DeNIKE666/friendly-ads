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
            <div class="card-body" :class="{'is-loading loader-primary' : loading === true}">
              <div id="task-form">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div>
                        <label class="typo__label">Выбрать опции заказа</label>
                        <multiselect
                            :value="value"
                            :options="options"
                            :multiple="true"
                            group-values="libs"
                            group-label="type"
                            placeholder="Нажмите для выбора"
                            track-by="name"
                            label="name"
                            @input="selectUnique"
                            @select="calcPlus"
                            @remove="calcMinus"
                            deselect-label="Удалить"
                            selectLabel="Нажмите для выбора">
                        </multiselect>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Название:</label>
                      <input type="text" class="form-control"
                             placeholder="название вашего проекта в общем списке заданий"
                             v-model.trim="form.title"
                             :class="{ 'is-invalid': form.errors.has('title') }">
                      <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Бюджет на исполнителя:</label>
                      <input type="text" class="form-control"
                             placeholder="150 руб"
                             v-model.trim="form.amount"
                             @keyup="calculateSite"
                             :class="{ 'is-invalid': form.errors.has('amount') }">
                      <has-error :form="form" field="amount"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div :class="{ 'is-invalid': form.errors.has('site_count') }">
                        <label class="typo__label">Кол-во сайтов</label>
                        <multiselect @change="calculateSite"
                                     v-model="form.site_count"
                                     :options="sites"
                                     track-by="text"
                                     label="text"
                                     :show-labels="false"
                                     @input="calculateSite"
                                     placeholder="Выбрать кол-во сайтов">
                          <template slot="singleLabel" slot-scope="{ option }">
                            <strong>{{ option.text }}</strong>
                          </template>
                        </multiselect>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Краткое описание:</label>
                      <textarea type="text" class="form-control"
                                rows="5"
                                placeholder="Опишите кратко ваше задание, что-бы с ним можно было ознакомиться"
                                v-model="form.description"
                                v-on:input="check"
                                :class="{ 'is-invalid': form.errors.has('description')}">
                      </textarea>
                      <p class="pt-3" :class="{help: true, 'text-danger': remainingShort === 0}">{{ instructionShort }}</p>
                      <has-error :form="form" field="description"></has-error>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Полное описание:</label>
                      <textarea type="text" class="form-control"
                                rows="5"
                                placeholder="Полное описание задания, это то где вы детельно описываете всю суть"
                                v-model="form.full_description"
                                v-on:input="check"
                                :class="{ 'is-invalid': form.errors.has('full_description')}">
                      </textarea>
                      <p class="pt-3" :class="{help: true , 'text-danger': remainingFull === 0}">{{ instructionFull }}</p>
                      <has-error :form="form" field="full_description"></has-error>
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
                      <span class="float-right price">Общая сумма: <span class="amount">{{ sumOption }}</span> руб. </span>
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
import Multiselect from 'vue-multiselect'
export default {
  components: { Multiselect },
  props: ['categories'],
  data() {
    return {
      isInvalid: true,
      loading: false,
      value: [],
      options: [{
        type: 'Период',
        libs: [{
          day: 1,
          name: '1 день',
          price: 100
        },
          {
            day: 2,
            name: '2 дня',
            price: 200
          }
        ]
      },
        {
          type: 'Тип',
          libs: [{
            type_task: 'link',
            name: 'Ссылка',
            price: 50
          },
            {
              type_task: 'video',
              name: 'Видео',
              price: 100
            }
          ]
        },
        {
          type: 'Позиция',
          libs: [{
            type_position: 'header',
            name: 'Хедер',
            price: 100
          },
            {
              type_position: 'footer',
              name: 'Футер',
              price: 50
            }
          ]
        }
      ],
      form: new Form({
        title: '',
        amount: 100,
        amount_price: 0,
        options_select: '',
        site_count: { count: 1, text: '1 сайт' },
        description: '',
        full_description: '',
        category_id: ''
      }),
      maxText : 300,
      totalSum: 0,
      sumOption: 0,
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
    }
  },
  mounted() {
  },
  computed: {
    // Введенные символы в краткое описание
    instructionShort: function() {
      return this.form.description === ''?
          'Лимит: '+ this.maxText+' символов':
          'Осталось '+this.remainingShort+' символов';
    },
    instructionFull: function() {
      return this.form.full_description === ''?
          'Лимит: '+ this.maxText+' символов':
          'Осталось '+this.remainingFull+' символов';
    },
    // Введенные символы в полное описание
    remainingShort: function() {
      return this.maxText - this.form.description.length;
    },
    remainingFull: function () {
      return this.maxText - this.form.full_description.length;
    }
  },
  methods: {
    // Проверка на введенные символы
    check: function() {
      this.form.description = this.form.description.substr(0, this.maxText)
      this.form.full_description = this.form.full_description.substr(0, this.maxText)
    },
    // Считаем все опции
    calcPlus (event) {
      let sum = event.length > 0 ?
            this.totalSum = event.reduce((acc, item) => this.totalSum + item.price, 0)
          : this.totalSum += event.price;

       this.sumOption = (this.form.amount * this.form.site_count.count) + sum;
    },
    // Минусуем опции которые были отключены
    calcMinus(event) {
      this.sumOption = (this.totalSum -= event.price) + this.form.amount * this.form.site_count.count;
    },
    // Складываем сумму на пользователя + кол-во сайтов
    calculateSite() {
      this.sumOption   = (this.form.amount * this.form.site_count.count) + this.totalSum;
    },
    selectUnique(ev) {
      if (!ev || ev.length < this.value.length) {
        this.value = ev;
        return;
      }

      let newValue = ev.filter(x => this.value.indexOf(x) === -1)[0];
      let group = this.getGroupByLib(newValue);
      if (this.value.some(x => this.getGroupByLib(x) === group)) {
        this.value = this.value.filter(x => this.getGroupByLib(x) !== group);
        this.value.push(newValue);
      } else
        this.value = ev;
    },
    getGroupByLib(lib) {
      return this.options.filter(x => x.libs.some(y => y.name === lib.name))[0].type;
    },
    // Проверяем все данные
    checkForm: function () {

      // Выбранные опции
      this.form.options_select = this.value

      if (this.form.options_select.length < 3) {

        $.notify({
          icon: 'fal fa-times',
          title: 'Произошла ошибка',
          message: 'Необходимо выбрать не мение 3 опций у вас выбрано ' + this.form.options_select.length ,
        },{
          // settings
          element: 'body',
          position: null,
          type: "danger",
          showProgressbar: false,
          placement: {
            from: "top",
            align: "right"
          },
          offset: 20,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
          },
        });

        return;
      }

      this.loading = true;

      // Средний бюджет на исполнителя
      this.form.amount_price = this.form.amount + this.sumOption;

      this.form.post('/cabinet/tasks').then(({ data }) => {
        window.location.href = '/cabinet/tasks'
      });

      setTimeout(() => {
        this.loading = false;
      }, 1000);

    },
    clear: function () {
      this.form.amount = '';
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

    .is-invalid {
      border: 1px solid #dc3545;
    }
</style>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>