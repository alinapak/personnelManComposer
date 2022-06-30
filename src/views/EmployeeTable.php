<?php
      include_once './bootstrap.php';

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
                     <td>" . $employee->setName()  . "</td>
                     <td>" . $employee->setSurname() . "</td>
                     <td> " . $employee->project_id->setProjName()  . "</td>
                  </tr>"
            );
         } else if ($employee->project_id === null) {
            print("<tr>
                     <td>" . $employee->getId() . "</td>
                     <td>" . $employee->setName()  . "</td>
                     <td>" . $employee->setSurname() . "</td>
                     <td></td>
                  </tr>"
            );
         }
      }
      print("</table>");
      print("<footer>
               <p id='footerText'> Copyright ©    <script>document.write(new Date().getFullYear())</script></p>
            </footer>");