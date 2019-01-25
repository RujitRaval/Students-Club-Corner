	                    <!-- hidden inline form -->
                        <div id="StreamAddEdit" style="display:none;">
                            <form id="stream" name="stream" action="#" method="post">
				
                                <table class="gridtable" width="100%" >
                                    <tr>
                                        <th colspan="2" align="center">Add / Edit Stream</th>
                                    </tr>
                                   <tr>
                                        <td>
                                            Stream Name
                                        </td>
                                        <td>
                                            <input type="text" id="streamname" required="required" name="streamname" size="40"  value="<?php echo $row['StreamName']?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Stream Description
                                        </td>
                                        <td>
                                            <textarea name="desc" cols="80" required="required" id="desc" ><?php echo $row['StreamDescription']?>
                                            </textarea>
                                        </td>
                                    </tr>
            
                                    <tr>
                                        <td>
                                            Stream Is Active
                                        </td>
                                        <td>
                                        
                                            <select id="isActive" name="isActive">
                                                <option value="1" <?php if($result['IsActive'] == '1'): ?> selected="selected"<?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($result['IsActive'] == '0'): ?> selected="selected"<?php endif; ?>>No</option>                            
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" >
                                            <input type="submit" name="btnSubmit" id="Save" value="Save"  />
                                        </td>
                                    </tr>    
                                </table>     
                            </form>
                        </div>
                        <!-- basic fancybox setup -->
