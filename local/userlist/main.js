/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


setInterval(() => {
    var day = new Date();
    $("#clock").html(day.getHours().toString() +
            ':' +
            (day.getMinutes() + 1).toString() +
            ':' +
            day.getSeconds().toString() );
}, 1000);