<?php 
                            $workshop = 1;
                            $seminar = 1;
                            $talkshow = 1;
                            $kategori = 'mahasiswa';
                            ?>
                       
                        <tr>
                                <td>001</td>
                                <td>Bayu Adi Prasetiyo</td>
                                <td>University Of Singapore</td>
                                <td>
                                    <?php if($kategori == 'mahasiswa'){
                                        echo '<a class="label label-warning">mahasiswa</a>';
                                    }else {
                                        echo '<a class="label label bg-purple">umum</a>';
                                    }?>
                                </td>
                                <td>085643281795</td>
                                <td>
                                    <?php if($talkshow == 1){
                                        echo '<a class="label label-success">Yes</>';
                                    }else{
                                        echo '<a class="label label-danger">No</>';
                                    } ?>
                                </td>
                                <td>
                                    <?php if($seminar == 1){
                                        echo '<a class="label label-success">Yes</>';
                                    }else{
                                        echo '<a class="label label-danger">No</>';
                                    } ?>
                                </td>
                                <td>                                    
                                    <?php if($workshop == 1){
                                        echo '<a class="label label-success">Yes</>';
                                    }else{
                                        echo '<a class="label label-danger">No</>';
                                    } ?>
                                </td>
                                <td>UI/X</td>
                                <td> <a class="btn btn-info" href="#">Konfirmasi</a> </td>
                            </tr>