<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6" v-for="task in tasks" :key="task.id">
          <div class="wrf-joblist">
            <div class="wrf-job-title-wrap">
              <h4 class="wrf-job-title verified-job">
                <a href="job-detail.html">
                  {{ task.title }}
                </a>
              </h4>

              <hr>

              <ul class="p-0">
                <li class="pb-3">Заказчик: {{ task.user.username }}</li>
                <li class="pb-2">Тип задания: <span class="highlight">{{ task.type_task }}</span></li>
                <li class="pb-2">Позиция размещения: <span class="highlight">{{ task.type_position }}</span></li>
                <li class="pb-2">Срок размещения: <span class="highlight">{{ task.period }}</span></li>
                <li class="pb-2">Откликнулись: <span class="highlight">{{ task.subscribe.length }}</span></li>
              </ul>

            </div>
            <div class="wrf-job-caption">
              <a href="">Перейти к заданию</a>
              <div class="d-flex justify-content-between mt-4">
                <span><i class="fal fa-eye"></i> {{ task.views }}</span>
                <span><i class="fal fa-ruble-sign"></i> {{ formatPrice(task.amount) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      tasks: null
    }
  },
  created() {
    axios.get('/api/projects').then(resp => {
      this.tasks = resp.data;
    })
  },
  filters: {
    truncate: function (text, length, suffix) {
      if (text.length > length) {
        return text.substring(0, length) + suffix;
      } else {
        return text;
      }
    },
  },
  methods: {
    formatPrice(value) {
      let val = (value/1).toFixed(0).replace('.', ',')
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
    }
  }
}
</script>
