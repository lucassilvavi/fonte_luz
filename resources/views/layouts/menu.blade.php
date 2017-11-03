
<ul class="sidebar-menu">
    <li>
        <a href="#"><i class="fa fa-th-large"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/inputs')}}">Inputs</a></li>
            <li><a href="{{url('/mascaras')}}">Máscaras</a></li>
            <li><a href="{{url('/tables')}}">Tables</a></li>
            <li><a href="{{url('/notification')}}">Notificações</a></li>
            <li><a href="{{url('/calendario')}}">Calendário</a></li>
            <li><a href="{{url('/icones')}}">Icones</a></li>
            <li><a href="{{url('/buttons')}}">Botões</a></li>
            <li><a href="{{url('/modals')}}">Modais</a></li>
            <li><a href="{{url('/tabs')}}">Abas</a></li>
            <li><a href="{{url('/progress-bar')}}">Progress Bar</a></li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Gráficos </span><span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li><a href="{{url('/charts-js')}}">Chart.js</a></li>
                    <li><a href="{{url('/google-chart')}}">Google Chart</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
                <a href="#"><i class="fa fa-circle-o"></i> Level One
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level Two
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
    </li>
    <li class="treeview">
        
        <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
    </li>

    @can('visualizar administração')
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Administração</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('/perfilUsuario')}}">Perfis</a></li>
            <li><a href="{{url('/permissoes')}}">Permissões</a></li>
            <li><a href="{{url('/grupoPermissao')}}">Grupos</a></li>
        </ul>
    </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Dados dos Usuário</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('/selecionarUsuario')}}">Usuários</a></li>
            </ul>
        </li>
        @endcan
</ul>