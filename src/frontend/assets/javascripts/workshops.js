(function (ng) {
    'use strict';

    var app = ng.module('meetupWorkshops', []);

    app.controller('FormCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.model = {};
        $scope.messages = [];
        $scope.registrando = false;

        $scope.submit = function () {
            $scope.messages.length = 0;

            var promise = $http({
                method: 'POST',
                url: 'registro.php',
                data: $scope.model
            });
            $scope.registrando = true;

            promise.success(function () {
                $scope.registrando = false;
                $scope.messages.push({
                    error: false,
                    text: '¡Registro completo! Muchas gracias.'
                });
            });

            promise.error(function (result) {
                $scope.registrando = false;
                result.errors.forEach(function (error) {
                    $scope.messages.push({
                        error: true,
                        text: error
                    });
                })
            });
        };
    }]);
}(angular));
