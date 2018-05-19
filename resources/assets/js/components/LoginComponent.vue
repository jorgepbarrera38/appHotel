<template>
      <div class="page-main">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <!--<img src="{{asset('site/assets/brand/tabler.svg')}}" class="h-6" alt="">-->
              </div>
              <form class="card" v-on:submit.prevent="login()">
                <div class="card-body p-6">
                  <div class="card-title">Login</div>
                  <div class="form-group">
                    <label class="form-label">Usuario</label>
                    <input v-model="user.username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese usuario">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Contraseña
                    </label>
                    <input v-model="user.password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese contraseña">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                </div>
              </form>
              <center><img src="http://weex.mx/resources/img/loader.gif" width="50" v-if="loading"></center>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
    import toastr from 'toastr';
    export default {
        beforeMount(){
          if (sessionStorage.getItem('api_token')) {
            this.$router.push('rooms');
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return {
            user:{
              username:'alexis',
              password:123456
            },
            loading:false
          }
        },
        methods:{
          login(){
            this.loading = true;
            axios.post('api/login', this.user).then(response=>{
              sessionStorage.setItem('api_token', response.data.api_token);
              sessionStorage.setItem('name', response.data.name);
              this.$router.push('rooms');
            }).catch(errors=>{
              if (errors.response.status == 401) {
                toastr.error(errors.response.data.message);
                this.loading = false;
              }
            });
          }
        }
    }
</script>
