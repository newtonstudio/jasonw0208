<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Angular JS Practise</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style>
    .myTable {
        border:1px solid black;
    }
    .myTable th {
        border:1px solid black;
    }
    .myTable td {
        border:1px solid black;
    }

    input.ng-invalid, textarea.ng-invalid {
        background-color: rgba(255,0,0,0.3);
    }
    input.ng-valid, textarea.ng-valid {
        background-color: rgba(0,255,0,0.3);
    }

    .red {
        color:red;
    }
    </style>
</head>
<body>    
    <div ng-app="myApp" ng-controller="myCtrl">
    {{test}}

    
    <form name="registerForm">
        Name: <input type="text" name="name" ng-model="myform.name" required><br/>
        <div class="red" ng-show="registerForm.name.$touched && registerForm.name.$invalid">Please fill in your name</div>

        Email: <input type="email" name="email" ng-model="myform.email" required><br/>
        <div class="red" ng-show="registerForm.email.$touched &&  registerForm.email.$invalid">Please fill in your email</div>

        Message: <br/><textarea name="message" rows="5" cols="10" ng-model="myform.message" required></textarea><br/>
        <div class="red" ng-show="registerForm.message.$touched &&  registerForm.message.$invalid">Please fill in your message</div>

        <input type="button" value="Submit" ng-disabled="registerForm.$invalid" ng-click="submitForm()"/>
    </form>

    <table class="myTable">
        <thead>
            <tr><th>Id</th><th>Product</th><th>Price</th><th>Owner</th></tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>iPhone</td><td>2499</td><td>Ali</td></tr>
            <tr><td>2</td><td>Samsung</td><td>2399</td><td>Ah Kau</td></tr>
            <tr><td>3</td><td>Blackberry</td><td>1299</td><td>Muthu</td></tr>
        </tbody>
    </table>

    <table class="myTable">
        <thead>
            <tr><th>Id</th><th>Product</th><th>Price</th><th>Owner</th></tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in phoneList">
                <td>{{item.Id}}</td>
                <td>{{item.Product}}</td>
                <td>{{item.Price}}</td>
                <td>{{item.Owner}}</td>
            </tr>            
        </tbody>
    </table>

    </div>
    <script>
    var app = angular.module("myApp",[]);
    app
    .controller("myCtrl", function($scope){

        $scope.myform = {};
        if(localStorage.myApp != null) {
            var tmp = localStorage.getItem("myApp");
            $scope.myform = JSON.parse(tmp);
        }

        $scope.submitForm = function(){
            // console.log($scope.myform);
            localStorage.setItem("myApp", JSON.stringify($scope.myform));
        }
        $scope.test = "Hello World";

        $scope.phoneList = [
            {"Id":1,"Product":"iPhone","Price":2499,"Owner":"Ali"},
            {"Id":2,"Product":"Samsung","Price":2399,"Owner":"Ah Kau"},
            {"Id":3,"Product":"Blackberry","Price":1299,"Owner":"Muthu"}
        ];



        //abc "Hello My Name"
    });
    </script>
</body>
</html>