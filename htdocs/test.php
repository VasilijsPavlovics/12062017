<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['name']))
                                                        {
                                                            $hostname = 'localhost';    
                                                            $username = 'root';
                                                            $passwordname = 'Baguvix!';
                                                            $basename = 'barbershop';
                                                            $connection = new mysqli($hostname, $username, $passwordname, $basename) or die ('Nezināmā kļūda savienošanas procesā!');
                                                            //-----------------------------------------
                                                            $email=$_SESSION['email'];
                                                            $query="SELECT `H_ID` FROM `hairdresser` WHERE `E_mail`='$email'";
                                                            $query_result= $connection->query($query);
                                                            $data=mysqli_fetch_array($query_result);
                                                            $h_id=$data['H_ID'];

                                                            $query="SELECT * FROM `hairdresser_client` WHERE `H_ID`='$h_id'";
                                                            $query_result= $connection->query($query);
                                                            //$data=mysqli_fetch_array($query_result);
                                                            echo $query;

          echo '<table border="1">';
          echo '<thead>';
          echo '<tr>';
          echo '<th>REC ID</th>';
          echo '<th>H ID</th>';
          echo '<th>C ID</th>';
          echo '<th>Laiks</th>';
          echo '<th>Data</th>';
          echo '<th>Locan</th>';
          echo '<th>Statuss</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
        while ($db1 = mysqli_fetch_assoc($query_result))
        {
                echo "TEST";
                $rec_id = $db1['Rec_ID'];
                $h_id = $db1['H_ID'];
                $c_id = $db1['C_ID'];
                $laiks = $db1['Time'];
                $datums = $db1['Date'];
                $location1 = $db1['Location'];
                $status = $db1['Status'];
                    echo '<tr>';
                    echo '<td>' . $rec_id . '</td>';
                    echo '<td>' . $h_id . '</td>';
                    echo '<td>' . $c_id . '</td>';
                    echo '<td>' . $laiks . '</td>';
                    echo '<td>' . $datums . '</td>';
                    echo '<td>' . $location1 . '</td>';
                    echo '<td>' . $status . '</td>';
                    echo '</tr>';           
        }
        echo '</tbody>';
        echo '</table>';

                                                        }
                                                        else
                                                        {
                                                            header("location: 404.php");
                                                        }   
                                                    ?>