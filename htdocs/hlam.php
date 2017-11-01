<form name="" action="" method="post">
            <table>
            <tr><td>Вид кредита</td>
            <td>
            <select size="1" name="type">
            <option value="0" <?php if ($_POST['type']=='0'){print "SELECTED";} ?>>аннуитет</option>
            <option value="1" <?php if ($_POST['type']=='1'){print "SELECTED";} ?>>линейный</option>
            <option value="2" <?php if ($_POST['type']=='2'){print "SELECTED";} ?> >индивидуальный</option>
            </select>
            </td></tr>
            <tr><td>Периодичность погашения ОД</td><td>
            <select size="1" name="col">
            <option value="1" <?php if ($_POST['col']=='1'){print "SELECTED";} ?>>ежедневно</option>
            <option value="2" <?php if ($_POST['col']=='2'){print "SELECTED";} ?>>каждые две недели</option>
            <option value="3" <?php if ($_POST['col']=='3'){print "SELECTED";} ?>>ежемесячно</option>
            <option value="4" <?php if ($_POST['col']=='4'){print "SELECTED";} ?>>ежеквартально</option>
            <option value="5" <?php if ($_POST['col']=='5'){print "SELECTED";} ?>>полугодовое</option>
            <option value="6" <?php if ($_POST['col']=='6'){print "SELECTED";} ?>>ежегодно</option>
            <option value="7" <?php if ($_POST['col']=='7'){print "SELECTED";} ?>>в конце срока</option>
            </select>
            </td></tr>
            <!--?php if ($_POST['type']=='2'){?-->
            if ($('#city').val() == 2) {
            <tr><td>Периодичность по вознаграждению</td><td>
            <select size="1" name="col2">
            <option value="1" <?php if ($_POST['col2']=='1'){print "SELECTED";} ?>>ежедневно</option>
            <option value="2" <?php if ($_POST['col2']=='2'){print "SELECTED";} ?>>каждые две недели</option>
            <option value="3" <?php if ($_POST['col2']=='3'){print "SELECTED";} ?>>ежемесячно</option>
            <option value="4" <?php if ($_POST['col2']=='4'){print "SELECTED";} ?>>ежеквартально</option>
            <option value="5" <?php if ($_POST['col2']=='5'){print "SELECTED";} ?>>полугодовое</option>
            <option value="6" <?php if ($_POST['col2']=='6'){print "SELECTED";} ?>>ежегодно</option>
            <option value="7" <?php if ($_POST['col2']=='7'){print "SELECTED";} ?>>в конце срока</option>
            </select>
            </td></tr>
            }