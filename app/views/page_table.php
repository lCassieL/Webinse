<table class="showList table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    foreach($this->persons as $person){
    ?>
    <tr>
     <td><?= $person['name']?></td>
     <td><?= $person['surname']?></td>
     <td><?= $person['email']?></td>
     <td>
         <form class="update" method="post">
            <input type="hidden" value="<?= $person['id']?>">
            <!-- <input type="hidden" name="action" value="logout"> -->
            <input type="submit" value="update">
         </form>
     </td>
     <td>
         <form class="delete" method="post">
            <input type="hidden" value="<?= $person['id']?>">
            <!-- <input type="hidden" name="action" value="logout"> -->
            <input type="submit" value="delete">
         </form>
     </td>
    </tr>
    <?php    
    }
    ?>
    </tbody>
</table>

<div id="modalWindow">
    <form class="edit" method="post">
	<input type="text" name="name" placeholder="name"/>
	<input type="text" name="surname" placeholder="surname"/>
	<input type="email" name="email" placeholder="email"/>
	<input type="submit" value="edit"/>
    </form>
</div>

<form class="add" method="post">
<div class="form-group">
    <label for="name1">Name:</label>
    <input type="text" name="name" class="form-control" id="name1">
</div>
<div class="form-group">
    <label for="surname1">Surname:</label>
    <input type="text" name="surname" class="form-control" id="surname1">
</div>
<div class="form-group">
    <label for="email1">Email:</label>
    <input type="email" name="email" class="form-control" id="email1">
</div>
    <input type="submit" class="btn btn-primary" value="enter">
</form>