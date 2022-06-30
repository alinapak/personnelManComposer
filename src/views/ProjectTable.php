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
      $projects = $entityManager->getRepository('Entities\Project')->findAll();
      print("<table>
               <tr>
                  <th>ID</th>
                  <th>Projektas</th>
                  <th> Darbuotojas</th>
                  <th>Pasirinktys</th>
               </tr>");
      foreach ($projects as $project) {
         $concated = [];
         for ($i = 0; $i < count($project->employeeWithProj); $i++) {
            array_push($concated, $project->employeeWithProj[$i]->setName() . " " . $project->employeeWithProj[$i]->setSurname());
         }
         print("<tr>
                  <td>" . $project->getId() . "</td>
                  <td>" . $project->setProjName()  . "</td>");
         $oneProject = implode(", ", $concated);
         print("<td>" . $oneProject . "</td>");
      }
      print("</tr>
         </table>");
      print("<footer>
               <p id='footerText'> Copyright ©    <script>document.write(new Date().getFullYear())</script></p>
            </footer>");
   ?>