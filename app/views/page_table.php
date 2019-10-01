<table class="showList">
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
    </tr>
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
    <label>Name:
        <input type="text" name="name">
    </label>
    <label>Surname:
        <input type="text" name="surname">
    </label>
    <label>Email:
        <input type="email" name="email">
    </label>
    <input type="submit" value="enter">
</form>