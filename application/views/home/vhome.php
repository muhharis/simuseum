<!--
* File      : Klinik2.php
* Language    : PHP
* Package   : CodeIgniter 3.0
* Location    : application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author      : MuhHaris
* Email       :muhharis90@yahoo.com
* HP      : 089-537-625-7021
*/
-->

              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <div class="alert alert-success fade in">
                          <button type="button" class="close close-sm" data-dismiss="alert">
                              <i class="icon-remove"></i>
                          </button>
                          <span><b>Selamat datang <U><?php echo $this->session->userdata('ses_nama');?></U> di Sistem Informasi Manajemen Administrasi Klinik Mutiavie Jepara</b></span>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Home
                          </header>
                          <div class="panel-body">
                              <div id="editor-container">
                                  <div id="header-editor">
                                      <div id="headerLeft" align="center">
                                          <img width="187px" height="187px" class="nav-user-photo" src="<?php echo base_url(); ?>assets/img/images/logo.jpg"/>
                                      </div>
                                      <div id="headerRight">
                                          <h2 id="sampleTitle" contenteditable="false">
                                               Sistem Informasi Manajemen Administrasi
                                                KLINIK MUTIA VIE
                                                

                                          </h2>
                                          <h3 contenteditable="false">
                                              Senenan RT 22 RW 05 Jepara, Telp.085101344062,082133889770
                                                Jl. Raya Bangsri, Desa Srobyong RT 01 RW 02 Mlonggo Telp 081227746665
                                          </h3>
                                      </div>
                                  </div>
                                 <!-- <div id="columns">
                                      <div id="column1">
                                          <div contenteditable="true">
                                              <h3>
                                                  Flatlab Resonsive Admin Templates
                                              </h3>
                                              <p>
                                                  <strong>
                                                      Lorem ipsum dolor sit amet dolor. Duis blandit vestibulum faucibus a, tortor.
                                                  </strong>
                                              </p>
                                              <p>
                                                  Proin nunc justo felis mollis tincidunt, risus risus pede, posuere cubilia Curae, Nullam euismod, enim. Etiam nibh ultricies dolor ac dignissim erat volutpat. Vivamus fermentum <a href="#">nisl nulla sem in</a> metus. Maecenas wisi. Donec nec erat volutpat.
                                              </p>
                                              <blockquote>
                                                  <p>
                                                      Fusce vitae porttitor a, euismod convallis nisl, blandit risus tortor, pretium.
                                                      Vehicula vitae, imperdiet vel, ornare enim vel sodales rutrum
                                                  </p>
                                              </blockquote>
                                              <blockquote>
                                                  <p>
                                                      Libero nunc, rhoncus ante ipsum non ipsum. Nunc eleifend pede turpis id sollicitudin fringilla. Phasellus ultrices, velit ac arcu.
                                                  </p>
                                              </blockquote>
                                              <p>Pellentesque nunc. Donec suscipit erat. Pellentesque habitant morbi tristique ullamcorper.</p>
                                              <p><strike>Mauris mattis feugiat lectus nec mauris. Nullam vitae ante.</strike></p>
                                          </div>
                                      </div>
                                      <div id="column2">
                                          <div contenteditable="true">
                                              <h3>
                                                  Bootstrap 3.0
                                              </h3>
                                              <p>
                                                  <strong>Aenean nonummy a, mattis varius. Cras aliquet.</strong>
                                                  Praesent <a href="#">magna non mattis ac, rhoncus nunc</a>, rhoncus eget, cursus pulvinar mollis.</p>
                                              <p>Proin id nibh. Sed eu libero posuere sed, lectus. Phasellus dui gravida gravida feugiat mattis ac, felis.</p>
                                              <p>Integer condimentum sit amet, tempor elit odio, a dolor non ante at sapien. Sed ac lectus. Nulla ligula quis eleifend mi, id leo velit pede cursus arcu id nulla ac lectus. Phasellus vestibulum. Nunc viverra enim quis diam.</p>
                                          </div>
                                          <div contenteditable="true">
                                              <h3>
                                                  Clean & Flat Concept Design
                                              </h3>
                                              <p>Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.</p>
                                              <p style="margin-left: 30px; ">Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="#">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.</p>
                                              <p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
                                          </div>
                                      </div>
                                      <div id="column3">
                                          <div contenteditable="true">
                                              <p>Quisque justo neque, mattis sed, fermentum ultrices <strong>posuere cubilia Curae</strong>, Vestibulum elit metus, quis placerat ut, lectus. Ut sagittis, nunc libero, egestas consequat lobortis velit rutrum ut, faucibus turpis. Fusce porttitor, nulla quis turpis. Nullam laoreet vel, consectetuer tellus suscipit ultricies, hendrerit wisi. Donec odio nec velit ac nunc sit amet, accumsan cursus aliquet. Vestibulum ante sit amet sagittis mi.</p>
                                              <h3>
                                                  Full Featured Frontend Ready
                                              </h3>
                                              <ul>
                                                  <li>Ut sagittis, nunc libero, egestas consequat lobortis velit rutrum ut, faucibus turpis.</li>
                                                  <li>Fusce porttitor, nulla quis turpis. Nullam laoreet vel, consectetuer tellus suscipit ultricies, hendrerit wisi.</li>
                                                  <li>Mauris eget tellus. Donec non felis. Nam eget dolor. Vestibulum enim. Donec.</li>
                                              </ul>
                                              <p>Quisque justo neque, mattis sed, <a href="#">fermentum ultrices posuere cubilia</a> Curae, Vestibulum elit metus, quis placerat ut, lectus.</p>
                                              <p>Nullam laoreet vel, consectetuer tellus suscipit ultricies, hendrerit wisi. Ut sagittis, nunc libero, egestas consequat lobortis velit rutrum ut, faucibus turpis. Fusce porttitor, nulla quis turpis.</p>
                                              <p>Donec odio nec velit ac nunc sit amet, accumsan cursus aliquet. Vestibulum ante sit amet sagittis mi. Sed in nonummy faucibus turpis. Mauris eget tellus. Donec non felis. Nam eget dolor. Vestibulum enim. Donec.</p>
                                          </div>
                                      </div>
                                  </div> -->

                              </div>
                          </div>
                      </section>

                  </div>
              </div>
              <!-- page end-->
