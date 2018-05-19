<template>
    <div class="my-3 my-md-5">
          <div class="container">
            <div class="row row-cards row-deck">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Habitaciónes</h3>
                    <div class="card-options">
                      <button v-on:click="addHabitation()" class="btn btn-success btn-sm"><i class="fe fe-plus"></i></button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th>Número</th>
                          <th>Precio</th>
                          <th>Tipo</th>
                          <th>Capacidad</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in habitations">
                          <td>
                            {{ item.number }}
                          </td>
                          <td>
                            ${{ convertToMoney(item.price) }}
                          </td>
                          <td>
                            {{ item.type }}
                          </td>
                          <td>
                            {{ item.maxpeople }} persona(s)
                          </td>
                          <td>
                            <button class="btn btn-info btn-sm" v-on:click="showHabitation(item.id)"><i class="fe fe-eye"></i></button>
                            <button class="btn btn-warning btn-sm" v-on:click="editHabitation(item.id)"><i class="fe fe-edit-3"></i></button>
                            <button class="btn btn-danger btn-sm" v-on:click="deleteHabitation(item.id, item.number)"><i class="fe fe-trash-2"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal new Habitations -->
          <div class="modal fade" id="modalAddHabitation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ editHabitationState ? 'Editar habitación' : 'Nueva habitación' }}</h5>
                </div>
                <div class="modal-body">
                  <div v-if="errors" class="alert alert-danger">
                    <li v-for="error in errors">{{ error[0] }}</li>
                  </div>
                  <form v-on:submit.prevent="editHabitationState ? updateHabitation(habitation.id) : saveHabitation()">
                    <div class="row">
                      <div class="col-md-6">
                            <label for="">Número de habitación</label>
                            <input type="number" class="form-control" v-model="habitation.number">
                      </div>
                      <div class="col-md-6">
                            <label for="">Precio</label>
                            <input type="number" class="form-control" v-model="habitation.price">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                            <label for="">Tipo</label>
                            <select class="form-control" v-model="habitation.type">
                              <option value="Individual">Individual</option>
                              <option value="Familiar">Familiar</option>
                            </select>
                      </div>
                      <div class="col-md-6">
                            <label for="">Número máximo de personas</label>
                            <input type="number" class="form-control" v-model="habitation.maxpeople">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label for="">Descripción</label>
                        <textarea rows="3" class="form-control" v-model="habitation.description"></textarea>
                      </div>
                    </div>
                    <button type="submit" style="display:none">Guardar</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" v-on:click="closeaddHabitation()">Cerrar</button>
                  <button type="button" class="btn btn-primary" v-on:click="editHabitationState ? updateHabitation(habitation.id) : saveHabitation()"><i v-bind:class="editHabitationState ? 'fe fe-refresh-cw mr-2':'fe fe-save mr-2'"></i>{{ editHabitationState ? 'Actualizar' : 'Guardar' }}</button>
                </div>
              </div>
            </div>
          </div>
          <!--Fin modal new Habitation-->
          <!-- Modal show Habitation-->
          <div class="modal fade" id="showHabitationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Habitación número {{ habitation.number }}</h5>
                </div>
                <div class="modal-body">
                  <div class="card">
                    <div class="card-body">
                      <!--<div class="media mb-5">
                        <img class="d-flex mr-5 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15ec911398e%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15ec911398e%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.65%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5>Axa Global Group</h5>
                          <address class="text-muted small">
                            1290 Avenua of The Americas<br>
                            New York, NY 101040105
                          </address>
                        </div>
                      </div>-->
                      <div class="row">
                        <div class="col-6">
                          <div class="h6">Tipo</div>
                          <p>{{ habitation.type }}</p>
                        </div>
                        <div class="col-6">
                          <div class="h6">Precio</div>
                          <p>${{ convertToMoney(habitation.price) }}</p>
                        </div>
                        <div class="col-6">
                          <div class="h6">Capacidad</div>
                          <p>{{ habitation.maxpeople }} persona(s)</p>
                        </div>
                        <div class="col-6">
                          <div class="h6">Estado actual</div>
                          <p>{{ habitation.state }}</p>
                        </div>
                      </div>
                      <div class="h6">Descripción</div>
                      <p>{{ habitation.description }}</p>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal show Habitation-->
    </div>
</template>
<script>
    import toastr from 'toastr';
    import formatNum from 'format-num';
    export default {
        created(){
          this.getHabitations();
        },
        data(){
          return {
              habitation: {
                number: '',
                price: '',
                type:'',
                maxpeople: '',
                description: ''
            },
            errors:null,
            habitations:[],
            editHabitationState: false
          }
        },
        methods: {
          getHabitations(){
            axios.get('api/rooms?api_token='+sessionStorage.getItem('api_token')).then(response=>{
              this.habitations = response.data;
            }).catch(error=>{
              if (error.response.status==401) {
                sessionStorage.removeItem('api_token');
                sessionStorage.removeItem('name');
               this.$router.push('/login');
              }
            });
          },
          addHabitation(){
            this.cleanFieldsAndErrors();
            this.editHabitationState = false;
            $('#modalAddHabitation').modal('show');
          },
          closeaddHabitation(){
            $('#modalAddHabitation').modal('hide');
            this.cleanFieldsAndErrors();
          },
          cleanFieldsAndErrors(){
            this.habitation.number = "";
            this.habitation.price = "";
            this.habitation.type = "";
            this.habitation.maxpeople = "";
            this.habitation.description = "";
            this.habitation.state = "";
            this.errors = null;
          },
          saveHabitation(){
            axios.post('api/rooms?api_token='+sessionStorage.getItem('api_token'), this.habitation).then(response=>{
              this.getHabitations();
              toastr.success('La habitación ha sido creada con éxito');
              this.closeaddHabitation();
            }).catch(error=>{
              if (error.response.status==401) {
                  $('#modalAddHabitation').modal('hide');
                  this.$router.push('/login');
              }else if (error.response.status==422) {
                this.errors = error.response.data.errors;
              }
            });
          },
          deleteHabitation(habitationId, habitationNumber){
            axios.delete('api/rooms/'+habitationId+'?api_token='+sessionStorage.getItem('api_token')).then(response=>{
              this.getHabitations();
              toastr.success(`La habitación ${ habitationNumber } ha sido eliminada`);
            });
          },
          editHabitation(habitationId){
            axios.get('api/rooms/'+habitationId+'/edit'+'?api_token='+sessionStorage.getItem('api_token')).then(response=>{
              console.log(response.data);
              this.habitation.id = response.data.id;
              this.habitation.number = response.data.number;
              this.habitation.price = response.data.price;
              this.habitation.type = response.data.type;
              this.habitation.maxpeople = response.data.maxpeople;
              this.habitation.description = response.data.description;
              this.editHabitationState = true;
              $('#modalAddHabitation').modal('show');
            });
          },
          updateHabitation(habitationId){
            axios.put('api/rooms/'+ habitationId+'?api_token='+sessionStorage.getItem('api_token'), this.habitation).then(response=>{
              this.getHabitations();
              $('#modalAddHabitation').modal('hide');
              toastr.success('Habitación actualizada exitosamente');
              this.cleanFieldsAndErrors();
            }).catch(error=>{
              if (error.response.status == 422) {
                this.errors = error.response.data.errors;
              }
            });
          },
          showHabitation(habitationId){
            axios.get('api/rooms/'+habitationId+'?api_token='+sessionStorage.getItem('api_token')).then(response=>{
              this.habitation = response.data;
              $('#showHabitationModal').modal('show');
            });
          },
          convertToMoney(number){
            return formatNum(number);
          }
        }
    }
</script>
<style>
.pull-right {
  float: right !important;
}
</style>
