<?php
   include_once './bootstrap.php';
   use Entities\Employee;

   function redirect_to_root(){
      header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
   }

   if(isset($_POST['createEmpl'])){
      $employee = new Employee();
      $fname = htmlspecialchars($_POST['fname']);
      $lname = htmlspecialchars($_POST['lname']);
      $employee->setName($fname);
      $employee->setSurname($lname);
      $entityManager->persist($employee);
      $entityManager->flush();
      redirect_to_root();
   }
   
   if(isset($_POST['deleteEm'])){
   $employee = $entityManager->find('Entities\Employee', $_POST['deleteEm']);
   $entityManager->remove($employee);
   $entityManager->flush();
   redirect_to_root();
   }

   if(isset($_POST['updateEmToDB'])){
      $fname = htmlspecialchars($_POST['fname']);
      $lname = htmlspecialchars($_POST['lname']);
      $employee = $entityManager->find('Entities\Employee', $_POST['updateEmToDB']);
      $project = $entityManager->find('Entities\Project',$_POST['projId']);
      $employee->getProj($project);
      $employee->setName($fname);
      $employee->setSurname($lname);
      $entityManager->flush();
      redirect_to_root();
  }
   print('<div class="navbar">
            <div>
               <a href="./">Home</a>
               <a href="./darbuotojai">Darbuotojai</a>
               <a href="./projektai">Projektai</a>
            </div>
            <p>Darbuotojų ir jų projektų valdymas</p>
         </div>
         ');
   $employees = $entityManager->getRepository('Entities\Employee')->findAll();
   print("<table>
            <tr>
               <th>ID</th>
               <th>Vardas</th>
               <th>Pavardė</th>
               <th>Projektas</th>
               <th>Pasirinktys</th>
            </tr>");

   foreach ($employees as $employee) {
      if ($employee->project_id !== null) {
         print("<tr>
                  <td>" . $employee->getId() . "</td>
                  <td>" . $employee->getName()  . "</td>
                  <td>" . $employee->getSurname() . "</td>
                  <td> " . $employee->project_id->getProjName()  . "</td>
                  <td>
                     <form method='POST' action=''>
                        <button id= 'deleteEm' name='deleteEm' value='".$employee->getId()."'>Ištrinti</button>
                        <button id='updateEm' name='updateEm' value='".$employee->getId()."'>Atnaujinti</button>
                     </form>
                  </td>
               </tr>"
         );
      } else if ($employee->project_id === null) {
         print("<tr>
                  <td>" . $employee->getId() . "</td>
                  <td>" . $employee->getName()  . "</td>
                  <td>" . $employee->getSurname() . "</td>
                  <td></td>
                  <td>
                     <form method='POST' action=''>
                        <button id= 'deleteEm' name='deleteEm' value='".$employee->getId()."'>Ištrinti</button>
                        <button id='updateEm' name='updateEm' value='".$employee->getId()." '>Atnaujinti</button>
                     </form>
                  </td>
               </tr>"
         );
      }
   }
   print("</table>");
   if (!isset($_POST['updateEm'])){
      print("<form class='createForm' action='' method='POST'>
               <input type='text' name='fname' placeholder='Vardas' required>
               <input type='text' name='lname' placeholder='Pavardė' required>
               <button id='createEmpl' name='createEmpl'>Pridėti</button>
            </form>");
   }
   else if (isset($_POST['updateEm'])) {
      print("<form class='updateForm' action='' method='POST'>
               <p class='createId'> Pakeisti darbuotojo, kurio ID yra " . $_POST['updateEm'] . ", duomenis</p>"
            );
      $employee = $entityManager->find('Entities\Employee', $_POST['updateEm']);
         print("<input type='text' name='fname' placeholder='Pakeisti darbuotojo vardą' value='". $employee->getName()  ."'required>
               <input type='text' name='lname' placeholder='Pakeisti darbuotojo pavardę' value='". $employee->getSurname()  ."' required>"
               );
         $projects = $entityManager->getRepository('Entities\Project')->findAll();
               print("<select id='projId' name='projId' onfocus='this.size=5'>");
               if ($employee->project_id===NULL) {
                  print("<option value='NULL'>--No Project--</option>");
                  foreach ($projects as $project) {
                        print("<option value='" . $project->getId(). "'>".$project->getProjName()."</option>");
                     }
                  }
               else if ($employee->project_id!==NULL){
                  print("<option value='" . $employee->project_id->getId(). "'>".$employee->project_id->getProjName()."</option>");
                  foreach ($projects as $project) {
                     if ($employee->project_id->getID() !== $project->getId()) {
                        print("<option value='" . $project->getId(). "'>".$project->getProjName()."</option>");
                     }
                  }
                  print("<option value='NULL'>--Be projekto--</option>");
               }
            print("</select>");
         print("<button name='updateEmToDB' value=" . $_POST['updateEm'] . ">Pakeisti</button>
            </form>");
   }
   print("<footer>
            <p id='footerText'> Copyright ©    <script>document.write(new Date().getFullYear())</script></p>
         </footer>");
