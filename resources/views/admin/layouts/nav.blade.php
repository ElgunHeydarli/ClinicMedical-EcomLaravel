<div class="site-menubar">
    <div class="site-menubar-body">
       <div>
          <div>
             <ul class="site-menu" data-plugin="menu">
               <li class="site-menu-category">Səhifələr</li>
              
               <li class="site-menu-item has-sub {{ (request()->is('admin')) ? 'active' : '' }}">
                   <a href="{{route('admin.dashboard')}}">
                   <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                   <span class="site-menu-title">Ana Səhifə</span>
                   </a>
               </li>
               <li class="site-menu-item has-sub {{ (request()->is('admin/orders')) ? 'active' : '' }}">
                  <a href="{{ route('orders.index') }}">
                      <i class="site-menu-icon wb-menu" aria-hidden="true"></i>
                          <span class="site-menu-title">Sifarişlər</span>
                  </a>
               </li>
               <li class="site-menu-item has-sub {{ (request()->is('admin/settings/about')) ? 'active' : '' }} {{ (request()->is('admin/team')) ? 'active' : '' }}">
                  <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                        <span class="site-menu-title">Haqqımızda</span>
                        <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                     <li class="site-menu-item">
                        <a href="{{ route('admin.setting.about') }}">
                           <span class="site-menu-title">Biz kimik</span>
                        </a>
                     </li>
                     <li class="site-menu-item">
                        <a href="{{ route('admin.setting.about1') }}">
                           <span class="site-menu-title">Missiyamız</span>
                        </a>
                     </li>
                     <li class="site-menu-item">
                        <a href="{{ route('question-answer.index') }}">
                           <span class="site-menu-title">Soruşulan Suallar</span>
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="site-menu-item has-sub {{ (request()->is('admin/slider')) ? 'active' : '' }}">
                  <a href="{{route('slider.index')}}">
                     <i class="site-menu-icon wb-image" aria-hidden="true"></i>
                     <span class="site-menu-title">Slider</span>
                  </a>
               </li>

               <li class="site-menu-item has-sub {{ (request()->is('admin/partners')) ? 'active' : '' }}">
                  <a href="{{route('partners.index')}}">
                     <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                     <span class="site-menu-title">Partnyorlar</span>
                  </a>
               </li>

          
               <li class="site-menu-item has-sub {{ (request()->is('admin/services')) ? 'active' : '' }}">
                  <a href="{{ route('services.index') }}">
                      <i class="site-menu-icon wb-menu" aria-hidden="true"></i>
                          <span class="site-menu-title">Xidmətlər</span>
                  </a>
               </li> 
               
               <li class="site-menu-item has-sub {{ (request()->is('admin/comment')) ? 'active' : '' }}">
                  <a href="{{ route('comment.index') }}">
                      <i class="site-menu-icon wb-menu" aria-hidden="true"></i>
                          <span class="site-menu-title">Müştəri Rəyləri</span>
                  </a>
               </li>  

               <li class="site-menu-item has-sub {{ (request()->is('admin/blog')) ? 'active' : '' }}">
                  <a href="{{ route('blog.index') }}">
                      <i class="site-menu-icon wb-menu" aria-hidden="true"></i>
                          <span class="site-menu-title">Xəbərlər</span>
                  </a>
               </li>
               
               <li class="site-menu-item has-sub {{ (request()->is('admin/portolio')) ? 'active' : '' }}">
                   <a href="javascript:void(0)">
                       <i class="site-menu-icon wb-image" aria-hidden="true"></i>
                           <span class="site-menu-title">Məhsullar</span>
                           <span class="site-menu-arrow"></span>
                   </a>
                   <ul class="site-menu-sub">
                        <li class="site-menu-item">
                           <a href="{{ route('category.index') }}">
                              <span class="site-menu-title">Kateqoriyalar</span>
                           </a>
                        </li>
                        <li class="site-menu-item">
                           <a href="{{ route('content.index') }}">
                              <span class="site-menu-title">Məhsullar</span>
                           </a>
                        </li>
                     </ul>
                </li>   

               <li class="site-menu-item has-sub {{ (request()->is('admin/settings/site-seo')) ? 'active' : '' }}">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon wb-search" aria-hidden="true"></i>
                          <span class="site-menu-title">SEO</span>
                          <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                       <li class="site-menu-item has-sub">
                          <a href="{{ route('admin.seo.homepage') }}">
                              <span class="site-menu-title">Əsas Səhifə</span>
                          </a>
                       </li>
                       <li class="site-menu-item has-sub">
                          <a href="{{ route('admin.seo.site') }}">
                              <span class="site-menu-title">Sayıtların Hazırlanması</span>
                          </a>
                       </li>
                    </ul>
               </li>

               <li class="site-menu-item has-sub {{ (request()->is('admin/settings/general')) ? 'active' : '' }}">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                          <span class="site-menu-title">Ayarlar</span>
                          <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                       <li class="site-menu-item has-sub">
                          <a href="{{ route('admin.setting.general') }}">
                              <span class="site-menu-title">Ümumi Ayarlar</span>
                          </a>
                       </li>
                       <li class="site-menu-item has-sub">
                          <a href="{{ route('admin.setting.contact') }}">
                              <span class="site-menu-title">Əlaqə Məlumatları</span>
                          </a>
                       </li>
                       <li class="site-menu-item">
                          <a href="{{ route('admin.setting.social') }}">
                             <span class="site-menu-title">Sosial Şəbəkələr</span>
                          </a>
                       </li>
                    </ul>
               </li>


         
             </ul>
          </div>
       </div>
    </div>
    <div class="site-menubar-footer">
       <a href="{{route('admin.setting.general')}}" class="fold-show" data-placement="top" data-toggle="tooltip"
          data-original-title="Ümumi Ayarlar">
       <span class="icon wb-settings" aria-hidden="true"></span>
       </a>
       <a href="/" target="_blank" data-placement="top" data-toggle="tooltip" data-original-title="Səhifəyə Bax">
       <span class="icon wb-eye" aria-hidden="true"></span>
       </a>
       <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Çıxış" role="menuitem"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
       <span class="icon wb-power" aria-hidden="true"></span>
       </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
       </form>
    </div>
 </div>