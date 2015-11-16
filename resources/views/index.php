<!DOCTYPE html>
<html lang="en-US" ng-app="pessoaRecords">
    <head>
        <title>Crud Usando Laravel E AngularJs</title>

        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
       
    </head>
    <body>
        <h2 align="center">Cadastro de Pessoas</h2>
        <div  ng-controller="pessoasController">

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Criar novo Registro</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="pessoa in pessoas">
                        
                        <td>{{ pessoa.name }}</td>
                        <td>{{ pessoa.email }}</td>
                        
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', pessoa.id)">Editar</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="delete(pessoa.id)">Deletar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Janela modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmPessoas" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="{{name}}" 
                                        ng-model="pessoa.name" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmPessoas.name.$invalid && frmPessoas.name.$touched">Nome é requerido</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Endereço  de Email " value="{{email}}" 
                                        ng-model="pessoa.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmPessoas.email.$invalid && frmPessoas.email.$touched">Digite um endereço de Email válido</span>
                                    </div>
                                </div>
                              

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmPessoas.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load Livrarias Javascript  -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        
        <!-- Scripts AngularJS  -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/pessoas.js') ?>"></script>
    </body>
</html>