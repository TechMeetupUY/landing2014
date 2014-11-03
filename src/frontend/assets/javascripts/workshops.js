(function (ng) {
    'use strict';

    var app = ng.module('meetupWorkshops', []);

    app.controller('FormCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.model = {};
        $scope.messages = [];

        $scope.submit = function () {
            $scope.messages.length = 0;

            var promise = $http({
                method: 'POST',
                url: 'registro.php',
                data: $scope.model
            });

            promise.success(function () {
                $scope.messages.push({
                    error: false,
                    text: '¡Registro completo! Muchas gracias y te esperamos en los workshops.'
                });
            });

            promise.error(function (result) {
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
