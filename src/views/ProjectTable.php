<?php
include_once './bootstrap.php';

use Entities\Project;

function redirect_to_root()
{
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

if (isset($_POST['createProj'])) {
    $repeatedProjMsg = "";
    $newproject = new Project();
    $projName = htmlspecialchars($_POST['createProj']);
    $checkFromDb = $entityManager->getRepository('Entities\Project')->findBy(array("project_name" => $projName));
    if ($checkFromDb[0] === NULL) {
        $newproject->setProjName($projName);
        $entityManager->persist($newproject);
        $entityManager->flush();
        redirect_to_root();
    } else {
        $repeatedProjMsg = "<p class='message'>Projektas tokiu pavadinimu jau egzistuoja</p>";
    }
}

if (isset($_POST['deleteP'])) {
    $project = $entityManager->find('Entities\Project', $_POST['deleteP']);
    $entityManager->remove($project);
    $entityManager->flush();
    redirect_to_root();
}

if (isset($_POST['updatePToDB'])) {
    $repeatedProjMsg = "";
    $project = $entityManager->find('Entities\Project', $_POST['updatePToDB']);
    $projName = htmlspecialchars($_POST['projUpdateName']);
    $checkFromDb = $entityManager->getRepository('Entities\Project')->findBy(array("project_name" => $projName));
    if ($checkFromDb[0] === NULL) {
        $project->setProjName($projName);
        $entityManager->flush();
        redirect_to_root();
    } else {
        $repeatedProjMsg = "<p class='message'>Projektas tokiu pavadinimu jau egzistuoja</p>";
    }
}
include 'header.php';

$projects = $entityManager->getRepository('Entities\Project')->findAll();
print("<table>
            <tr>
                <th>ID</th>
                <th>Projektas</th>
                <th> Darbuotojai</th>
                <th>Pasirinktys</th>
            </tr>");
foreach ($projects as $project) {
    $concated = [];
    for ($i = 0; $i < count($project->employeeWithProj); $i++) {
        array_push($concated, $project->employeeWithProj[$i]->getName() . " " . $project->employeeWithProj[$i]->getSurname());
    }
    print("<tr>
                <td>" . $project->getId() . "</td>
                <td>" . $project->getProjName()  . "</td>");
    $oneProject = implode(", ", $concated);
    print("<td>" . $oneProject . "</td>");
    print('<td>
                    <form method="POST" action="">
                        <button id= "deleteP" name="deleteP" value="' . $project->getId() . '">Ištrinti</button>
                        <button id= "updateP" name="updateP" value="' . $project->getId() . '">Atnaujinti</button>
                    </form>
                </td>');
}
print("</tr>
            </table>");
isset($_POST['createProj']) ? print($repeatedProjMsg) : "";
isset($_POST['updatePToDB']) ? print($repeatedProjMsg) : "";
if (!isset($_POST['updateP'])) {
    print("<form class='createForm' action='' method='POST'>
            <input type='text' name='createProj' required>
            <button>Pridėti</button>
        </form>");
} else if (isset($_POST['updateP'])) {
    print("<form class='updateForm' action='' method='POST'>
                    <p>Pakeisti projektą, kurio id yra " . $_POST['updateP'] . "</p>");
    $project = $entityManager->find('Entities\Project', $_POST['updateP']);
    print("<input type='text' name='projUpdateName' value='" . $project->getProjName()  . "' required>
                    <button type='updatePToDB' name='updatePToDB' value='" . $_POST['updateP'] . "'>Pakeisti</button>
            </form>");
}
include 'footer.php';
