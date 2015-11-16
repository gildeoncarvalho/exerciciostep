app.controller('pessoasController', function($scope, $http, API_URL) {
    
    $http.get(API_URL + "pessoas")
            .success(function(response) {
                $scope.pessoas = response;
            });
    
   
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Pessoa";
                break;
            case 'edit':
                $scope.form_title = "Pessoa Detail";
                $scope.id = id;
                $http.get(API_URL + 'pessoas/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.pessoa = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }


    $scope.save = function(modalstate, id) {
        var url = API_URL + "pessoas";
        
       
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.pessoa),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Ocorreu um erro');
        });
    }


    $scope.delete = function(id) {
        var isConfirmDelete = confirm('Você tem certeza que deseja deletar?');
        if (isConfirmDelete==true) {
            $http({method: 'DELETE', url: API_URL + 'pessoas/' + id}).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});

