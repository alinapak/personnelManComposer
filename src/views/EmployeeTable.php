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

            // READ!!!!
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
                     </form>
                  </td>
               </tr>"
         );
      }
   }
   print("</table>");
   print("<form class='createForm' action='' method='POST'>
            <input type='text' name='fname' placeholder='Vardas' required>
            <input type='text' name='lname' placeholder='Pavardė' required>
            <button id='createEmpl' name='createEmpl'>Pridėti</button>
         </form>");
   print("<footer>
            <p id='footerText'> Copyright ©    <script>document.write(new Date().getFullYear())</script></p>
         </footer>");
