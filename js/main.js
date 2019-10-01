deletePerson();
addPerson();
openEditPersonForm();

function deletePerson(){
$("form.delete").submit(function () {
    var xhr = new XMLHttpRequest();
    var id = $(this).find('input[type="hidden"]').val();
    var body = 'id=' + encodeURIComponent(id);
    xhr.open("POST", location.origin + '/main/delete', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            $("table").empty();
            getPersons();
        }
        ;

    };
    xhr.send(body);
    return false;
});
}

function addPerson(){
    $("form.add").submit(function () {
	    var name = $(this).find('input[name="name"]').val();
	    var surname = $(this).find('input[name="surname"]').val();
	    var email = $(this).find('input[type="email"]').val();
        var xhr = new XMLHttpRequest();
        var body = 'name=' + encodeURIComponent(name) + '&surname=' + encodeURIComponent(surname) + '&email=' + encodeURIComponent(email);
        xhr.open("POST", location.origin + '/main/add', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                $("table").empty();
                getPersons();
            }
            ;
    
        };
        xhr.send(body);
        return false;
    });

}
//TODO:
function openEditPersonForm(){
    $("form.update").submit(function(){
        var id = $(this).find('input[type="hidden"]').val();
        $('div#modalWindow').css('display', 'block');
        $('form.edit').append('<input type="hidden" value="'+id+'">');
        return false;
    });
}
//TODO:
function editPereson(){
    $("form.add").submit(function () {
	    var name = $(this).find('input[name="name"]').val();
	    var surname = $(this).find('input[name="surname"]').val();
	    var email = $(this).find('input[type="email"]').val();
        var xhr = new XMLHttpRequest();
        var body = 'name=' + encodeURIComponent(name) + '&surname=' + encodeURIComponent(surname) + '&email=' + encodeURIComponent(email);
        xhr.open("POST", location.origin + '/main/add', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                $("table").empty();
                getPersons();
            }
            ;
    
        };
        xhr.send(body);
        return false;
    });
}
function getPersons() {
var xhr = new XMLHttpRequest();
xhr.open('GET', location.origin + '/main/information');
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var json = xhr.responseText;
        var persons = JSON.parse(json);
        if (persons) {
            var content = '';
            content +='<table>' +
    '<tr>'+
        '<th>Name</th>'+
        '<th>Surname</th>'+
        '<th>Email</th>'+
    '</tr>'; 
    $(persons).each(function (i, person) {
        content += '<tr>'+
     '<td>'+person.name+'</td>'+
     '<td>'+person.surname+'</td>'+
     '<td>'+person.email+'</td>'+
     '<td>'+
         '<form class="update" method="post">'+
            '<input type="submit" value="update">'+
         '</form>'+
     '</td>'+
     '<td>'+
         '<form class="delete" method="post">'+
            '<input type="hidden" value="'+ person.id + '">'+
            '<input type="submit" value="delete">'+
         '</form>'+
     '</td>'+
    '</tr>';
    });    
    content+= '</table>';
    var container = document.getElementsByClassName('showList')[0];
    container.innerHTML = content;
    deletePerson();
        }
    }
};
xhr.send();
}