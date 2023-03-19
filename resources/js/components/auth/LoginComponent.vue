<template>
    <div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h2 class="text-center">Поликлиника</h2>
                <hr>
                <p class="login-box-msg">Войдите чтобы начать работу</p>
                <small v-show="errorsVisible">
                    <div class="alert alert-danger">
                        <ul v-for="error in errors.errors">
                                    {{error}}
                        </ul>
                        <ul v-if="errors.status">
                            {{[errors.message]}}
                        </ul>
                    </div>

                </small>

                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" v-model="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope">
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" v-model="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="active" v-model="remember">
                                <label for="remember">
                                    Запомнит меня
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" @click.prevent="submitForm" class="btn btn-primary btn-block">Войти</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
          return {
              email: null,
              password: null,
              remember: null,
              errorsVisible: false,
              errors: {},
          }
        },
        methods:{
          submitForm() {
              axios.get('/sanctum/csrf-cookie').then( response => {
                  axios.post('/api/login', {email: this.email, password: this.password})
                      .then(r => {
                          if(r.status == '200'){
                              this.$router.push('/');
                          }
                      }).catch(res => {
                          this.errorsVisible = true;
                          this.errors  = res.response.data;
                  })
              })
          },
        },
    }


</script>

<style scoped>

</style>