<?
if($INCLUDE_FROM_CACHE!='Y')return false;
$datecreate = '001503250222';
$dateexpire = '001539250222';
$ser_content = 'a:2:{s:7:"CONTENT";s:11974:"


  <article class="container type-product bg-info">
            <div class="col-sm-6 no-padding">
                <article class="oneslider slider magnific-wrap">
                    <ul>
                                            <li>
                            <a href="/upload/iblock/16c/16c1e6b4c87738a702bc966bf4ff716d.JPG" title="" class="magnific"><img src="/upload/iblock/16c/16c1e6b4c87738a702bc966bf4ff716d.JPG" alt=""></a>
                        </li>
                                                                <li>
                            <a href="/upload/iblock/a9f/a9fcc51c28b1eea6d551c8e243cb756d.JPG" title="" class="magnific"><img src="/upload/iblock/a9f/a9fcc51c28b1eea6d551c8e243cb756d.JPG" alt=""></a>
                        </li>
                                        
                     
                    </ul>
                    <nav class="nav-pages left-pos"></nav>
                    
                                        <div class="sticker sticker-info">���</div>
                                        
                </article>
                
       
                
            </div>
            <div class="col-sm-6 type-description m-center">
                <span class="price">
                    <span class="amount">&#8381; 2 500</span>
                </span>
                <div class="rating-wrap">
                    <div class="raty" data-score="5" data-readonly="true"></div>
                   
                    <a href="#reviews" data-toggle="tab" class="add-review tab-link">�������� �����</a>
                </div>
                <p>����/���� ����/���� �����/��������, �����</p>
                
                                <form id="addcat" action="/ajax/addcat.php" method="POST">
                <input type="hidden" value="134" name="idelementa" />
                <input type="hidden" value="2 500" name="cena" />
                <div class="product-quantity inline">
                    <a href="" class="minus disabled">-</a>
                    <input name="kolvo" type="text" value="1">
                    <a href="" class="plus">+</a>
                </div>
                      <input type="button" onclick="ajaxaddcat()" value="�������� � �������" class="btn btn-default" /> 
                </form>
                <div id="resaddcat" style="color: green;"></div>
                                 <table class="table cart-total">
                    <tr>
                        <th>�������</th>
                        <td class="text-muted">A134</td>
                    </tr>
                    <tr>
                    <th>������</th>
                        <td>������</td>
                    </tr>
                </table>
             
            </div>
        </article>
        <!-- /.container -->

        <!-- CONTAINER -->
        <article class="container">
            <ul class="nav nav-tabs text-center">
                <li class="active"><a href="#description" data-toggle="tab"><span>��������</span></a></li>
                <li><a href="#reviews" data-toggle="tab"><span>������</span></a></li>
            </ul>
            <section class="tab-content clearfix">
                <article class="tab-pane fade in active m-center" id="description">
                    <div class="col-sm-4 col-sm-offset-1">
                        <h3>�������� � ������<small>������</small></h3>
                    </div>
                    <div class="col-sm-6">
                        <p> 
                        ������� ������<br />
�������: 60 ��<br />
������: 78 ��<br />
������: 41 ��<br />
������� �����<br />
- �� ��������� ����� ������ ����� ��������� ��������� ����������, ������� ����� � ���������� ������������ � ������������ �������� � ������������ ���������.<br />
- ������� ������ �������� �� ������������. ������ ������������� ��������� ������� �� �������.<br />
- ����� ������������ � ������ � ������ ���������� � ���������� ������� ���������, � ����� �� �������.<br />
��������:<br />
Francis Cayouette<br />
������� � ��� ��������<br />
6 ��������<br />
����������� �����, ������� � ��� ��������<br />
������������� ����������<br />
������/����/�������� �������/������� ����� ��� ����:<br />
��������, �� �������� ����������� ������ �������, ������������ �����������. ������������ � ��������� ����������� ������� � ����� ������ � �������, ���������� �� ���������������� ����������� � ����� �������.<br />
�������� ����������<br />
������ ��� ������������� � ���������.<br />
��� ����������� ������������ ��� ������ ���� ������ ������� 70 �� �� �������� �������� ���������� ���������� ��� ������������� ��������� ��� �������������� �������������.<br />
�������� � ������� ������<br />
����:<br />
�������� �����/ �������: �����, ������������ ���������� ��������<br />
������: ������� �������<br />
��������/ �����: �����, �������������<br />
<br />
�������� �������:<br />
�����, ������������ ���������� ��������<br />
<br />
������� ����� ��� ����:<br />
���, ��������� ������<br />
<br />
������:<br />
������: ������������<br />
����� ������: �����, �������������                        </p>
                    </div>
                </article>
                <article class="tab-pane fade" id="reviews">
                    <div class="comments">
                    
                 
             
                    </div>
                    
                    

                    <div class="col-sm-5 col-sm-offset-3 no-padding">
                        <h3>�������� ����� </h3>
                        <form method="POST" action="" id="comentform">
                        <input type="hidden" value="134" name="IDTOV" />
                            <div class="rating-wrap">
                                <div class="raty"></div>
                            </div>
                            <div class="form-group">
                                <input id="name" name="names" type="text" class="form-control" placeholder="���� ���" >
                            </div>
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control" placeholder="��� e-mail">
                            </div>
                            <div class="form-group">
                                <textarea id="mes" name="message" placeholder="MESSAGE"></textarea>
                            </div>
                            <input type="button" onclick="ajaxcoment()" value="��� e-mail" class="btn btn-default btn-wd" /> 
                            
                        </form>
                        <div id="results"></div>
                    </div>
                </article>
            </section>
        </article>
        <!-- /.container -->

        <!-- CONTAINER -->
        <article class="container slider text-center products">
            <ul>
            
            
                            <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=76"><img src="/upload/iblock/98a/98a4ccbceae16c61a67a10426ac2f7e3.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=2&ELEMENT_ID=76">�������</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 6 699</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=76" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=3&ELEMENT_ID=36"><img src="/upload/iblock/c6e/c6ea90ff49eda115534a363acc14142e.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=3&ELEMENT_ID=36">������</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 7 170</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=3&ELEMENT_ID=36" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=4&ELEMENT_ID=59"><img src="/upload/iblock/96d/96df0839b4aadf5970468ca2e905fa3a.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=4&ELEMENT_ID=59">������</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 36 999</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=4&ELEMENT_ID=59" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=96"><img src="/upload/iblock/b9f/b9f36117d73176079b9190f5892bc8bf.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=2&ELEMENT_ID=96">����</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 6 999</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=96" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=78"><img src="/upload/iblock/b96/b9670fb430ddc5c41a7e028dd3a66306.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=2&ELEMENT_ID=78">�����</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 49 990</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=78" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=90"><img src="/upload/iblock/814/814a61cb4a7d5d6e475ffee4b8b2aba9.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=2&ELEMENT_ID=90">������</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 22 996</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=90" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=79"><img src="/upload/iblock/ad7/ad77ad2c6ae95e3a488b522456c48f8e.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=2&ELEMENT_ID=79">�����</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 54 990</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=79" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=94"><img src="/upload/iblock/055/055ba67e053db912ef4ea8aa330afb3a.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=2&ELEMENT_ID=94">����� / �����</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 20 579</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=2&ELEMENT_ID=94" class="btn btn-link">���������</a>
                </li>
                <li class="col-sm-4 product">
                    <a href="/catalog/?SECTION_ID=3&ELEMENT_ID=37"><img src="/upload/iblock/fb0/fb0ca8c17e767ef4286f32ce4c2243f2.JPG" alt=""></a>
                    <h6><a href="/catalog/?SECTION_ID=3&ELEMENT_ID=37">������</a></h6>
                    <span class="price">
                        <span class="amount">&#8381; 9 520</span>
                    </span>
                    <a href="/catalog/?SECTION_ID=3&ELEMENT_ID=37" class="btn btn-link">���������</a>
                </li>
             
            </ul>
            <a href="" class="arrow prev"><i></i></a>
            <a href="" class="arrow next"><i></i></a>
        </article>
        <!-- /.container -->";s:4:"VARS";a:2:{s:8:"arResult";a:11:{s:9:"IBLOCK_ID";i:4;s:2:"ID";i:134;s:17:"IBLOCK_SECTION_ID";s:1:"1";s:4:"NAME";s:6:"������";s:13:"LIST_PAGE_URL";s:23:"/catalog/index.php?ID=4";s:7:"SECTION";a:53:{s:2:"ID";s:1:"1";s:3:"~ID";s:1:"1";s:11:"MODIFIED_BY";s:1:"1";s:12:"~MODIFIED_BY";s:1:"1";s:10:"CREATED_BY";s:1:"1";s:11:"~CREATED_BY";s:1:"1";s:9:"IBLOCK_ID";s:1:"4";s:10:"~IBLOCK_ID";s:1:"4";s:17:"IBLOCK_SECTION_ID";N;s:18:"~IBLOCK_SECTION_ID";N;s:6:"ACTIVE";s:1:"Y";s:7:"~ACTIVE";s:1:"Y";s:13:"GLOBAL_ACTIVE";s:1:"Y";s:14:"~GLOBAL_ACTIVE";s:1:"Y";s:4:"SORT";s:3:"500";s:5:"~SORT";s:3:"500";s:4:"NAME";s:6:"������";s:5:"~NAME";s:6:"������";s:7:"PICTURE";N;s:8:"~PICTURE";N;s:11:"LEFT_MARGIN";s:1:"1";s:12:"~LEFT_MARGIN";s:1:"1";s:12:"RIGHT_MARGIN";s:1:"2";s:13:"~RIGHT_MARGIN";s:1:"2";s:11:"DEPTH_LEVEL";s:1:"1";s:12:"~DEPTH_LEVEL";s:1:"1";s:11:"DESCRIPTION";s:0:"";s:12:"~DESCRIPTION";N;s:16:"DESCRIPTION_TYPE";s:4:"text";s:17:"~DESCRIPTION_TYPE";s:4:"text";s:4:"CODE";N;s:5:"~CODE";N;s:6:"XML_ID";s:1:"4";s:7:"~XML_ID";s:1:"4";s:6:"TMP_ID";N;s:7:"~TMP_ID";N;s:14:"DETAIL_PICTURE";N;s:15:"~DETAIL_PICTURE";N;s:15:"SOCNET_GROUP_ID";N;s:16:"~SOCNET_GROUP_ID";N;s:13:"LIST_PAGE_URL";s:23:"/catalog/index.php?ID=4";s:14:"~LIST_PAGE_URL";s:23:"/catalog/index.php?ID=4";s:16:"SECTION_PAGE_URL";s:22:"/catalog/?SECTION_ID=1";s:17:"~SECTION_PAGE_URL";s:22:"/catalog/?SECTION_ID=1";s:14:"IBLOCK_TYPE_ID";s:10:"1c_catalog";s:15:"~IBLOCK_TYPE_ID";s:10:"1c_catalog";s:11:"IBLOCK_CODE";s:14:"katalogtovarov";s:12:"~IBLOCK_CODE";s:14:"katalogtovarov";s:18:"IBLOCK_EXTERNAL_ID";s:14:"katalogtovarov";s:19:"~IBLOCK_EXTERNAL_ID";s:14:"katalogtovarov";s:11:"EXTERNAL_ID";s:1:"4";s:12:"~EXTERNAL_ID";s:1:"4";s:4:"PATH";a:1:{i:0;a:31:{s:2:"ID";s:1:"1";s:3:"~ID";s:1:"1";s:4:"CODE";N;s:5:"~CODE";N;s:6:"XML_ID";s:1:"4";s:7:"~XML_ID";s:1:"4";s:11:"EXTERNAL_ID";s:1:"4";s:12:"~EXTERNAL_ID";s:1:"4";s:9:"IBLOCK_ID";s:1:"4";s:10:"~IBLOCK_ID";s:1:"4";s:17:"IBLOCK_SECTION_ID";N;s:18:"~IBLOCK_SECTION_ID";N;s:4:"SORT";s:3:"500";s:5:"~SORT";s:3:"500";s:4:"NAME";s:6:"������";s:5:"~NAME";s:6:"������";s:6:"ACTIVE";s:1:"Y";s:7:"~ACTIVE";s:1:"Y";s:11:"DEPTH_LEVEL";s:1:"1";s:12:"~DEPTH_LEVEL";s:1:"1";s:16:"SECTION_PAGE_URL";s:22:"/catalog/?SECTION_ID=1";s:17:"~SECTION_PAGE_URL";s:22:"/catalog/?SECTION_ID=1";s:14:"IBLOCK_TYPE_ID";s:10:"1c_catalog";s:15:"~IBLOCK_TYPE_ID";s:10:"1c_catalog";s:11:"IBLOCK_CODE";s:14:"katalogtovarov";s:12:"~IBLOCK_CODE";s:14:"katalogtovarov";s:18:"IBLOCK_EXTERNAL_ID";s:14:"katalogtovarov";s:19:"~IBLOCK_EXTERNAL_ID";s:14:"katalogtovarov";s:13:"GLOBAL_ACTIVE";s:1:"Y";s:14:"~GLOBAL_ACTIVE";s:1:"Y";s:16:"IPROPERTY_VALUES";a:0:{}}}}s:16:"IPROPERTY_VALUES";a:0:{}s:11:"TIMESTAMP_X";s:19:"20.08.2017 18:02:41";s:16:"BACKGROUND_IMAGE";b:0;s:19:"USE_CATALOG_BUTTONS";a:0:{}s:9:"META_TAGS";a:4:{s:5:"TITLE";s:6:"������";s:13:"BROWSER_TITLE";s:6:"������";s:8:"KEYWORDS";s:0:"";s:11:"DESCRIPTION";s:0:"";}}s:18:"templateCachedData";a:2:{s:9:"frameMode";b:1;s:8:"__NavNum";i:1;}}}';
return true;
?>