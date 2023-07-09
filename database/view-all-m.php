<tr>
                        <td>
                      <div class="avatar"><img  src="../img/m/<?php echo htmlentities($result->Image);?>" width="70px" class="img-rounded"></div>

                            </td>

                            <td data-label="Member ID">
                                <?php echo htmlentities($result->MemId);?>
                            </td>
                            <td data-label="Name">
                                <?php echo htmlentities($result->Name);?>
                            </td>

                            <td data-label="Mobile">
                                <a href="tel:  <?php echo htmlentities($result->Mobile);?>  ">
                                    <?php echo htmlentities($result->Mobile);?>
                                </a>
                            </td>
                            <td data-label="Email">
                                <a href="mailto:  <?php echo htmlentities($result->Email);?> ">
                                    <?php echo htmlentities($result->Email);?>
                                </a>
                            </td>
                            <td data-label="Bachelor Year">
                                <?php echo htmlentities($result->Bachelor);?>
                            </td>

            <td data-label="Details">

			<a type="button" class="btn btn-primary btn-sm" href="details-general-member.php?id=<?php echo htmlentities($result->id);?>"> <i class="fa fa-eye"></i> Details View </a> 
                            </td>

                        </tr>
