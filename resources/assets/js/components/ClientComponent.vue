<template>
    <div class="my-3 my-md-5">
          <div class="container">
            <div class="row row-cards row-deck">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Clientes</h3>
                    <div class="card-options">
                      <button class="btn btn-success btn-sm"><i class="fe fe-plus"></i></button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th>Identificación</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Nacionalidad</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1120573514</td>
                          <td>Alexis</td>
                          <td>Paz Barrera</td>
                          <td>Colombia</td>
                          <td>
                            <button class="btn btn-info btn-sm"><i class="fe fe-eye"></i></button>
                            <button class="btn btn-warning btn-sm"><i class="fe fe-edit-3"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fe fe-trash-2"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!--<div class="card-footer">
                      <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                          <a class="page-link" href="" v-on:click.prevent="changePage(pagination.current_page - 1)">
                            <span>Atrás</span>
                          </a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '' ]">
                          <a class="page-link" href="" v-on:click.prevent="changePage(page)">
                            {{ page }}
                          </a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                          <a class="page-link" href="" v-on:click.prevent="changePage(pagination.current_page + 1)">
                            <span>Siguiente</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</template>
