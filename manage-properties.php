<?php
$sPageTitle = 'Manage Properties';
$sActive = 'account';
require_once(__DIR__ . '/components/top.php');

session_start();

if (!$_SESSION || $_SESSION['jUser']->role == 'user') {
    header('location:index');
}
?>

<div class="container">
    <table id="dtBasicExample" class="table table-striped" cellspacing="0" width="100%">
        <thead class="thead">
            <tr>
                <th class="th-sm">Street + number
                </th>
                <th class="th-sm">City
                </th>
                <th class="th-sm">Zipcode
                </th>
                <th class="th-sm">State
                </th>
                <th class="th-sm">Price (in $)
                </th>
                <th class="th-sm">Type
                </th>
                <th class="th-sm">Size (in sqft)
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $jUser = $_SESSION['jUser'];

            foreach ($jUser->properties as $sKey => $jProp) {
                echo '
                    <tr id="' . $sKey . '">
                        <td>' . $jProp->location->street . ' ' . $jProp->location->housenumber . '</td>
                        <td>' . $jProp->location->city . '</td>
                        <td>' . $jProp->location->zipcode . '</td>
                        <td>' . $jProp->location->state . '</td>
                        <td>' . number_format($jProp->price) . '</td>
                        <td>' . $jProp->type . '</td>
                        <td>' . number_format($jProp->size) . '</td>
                        <td class="edit-delete">
                        <a href="update-property?id=' . $sKey . '" style="color:#007bff" class="fas fa-edit fa-2x"></a>
                        <i class="fas fa-trash-alt fa-2x" style="cursor:pointer" onClick="deleteProperty(\'' . $sKey . '\')"></i>
                        </td>
                    </tr>
                    ';
            }

            ?>
        </tbody>
    </table>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>