<ul class="sidebar-menu">
    <li>
        <a href="/"><i class="fa fa-home"></i> <span>Home</span>
        </a>
    </li>
    <li>
        <a href="/perfil"><i class="fa fa-user"></i> <span>Dados Pessoais</span>
        </a>
    </li>
    <li>
        <a href="/contribuicao"><i class="fa fa-money"></i> <span>Contribuição</span>
        </a>
    </li>
    @can('isencao de contribuicao')
    <li>
        <a href="/isencao/contribuicao"><i class="fa fa-minus"></i> <span>Insenção de Contribuição</span>
        </a>
    </li>
    @endcan
    @can('ajuste contribuicao')
    <li>
        <a href="/ajuste/contribuicao"><i class="fa fa-pencil"></i> <span>Ajuste da Contribuição</span>
        </a>
    </li>
    @endcan
    @can('tesouraria')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-diamond"></i> <span>Tesouraria</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/controle/contribuicao"><i class="fa fa-circle-o"></i>Controle de Contribuição</a></li>
                <li><a href="/pedente/contribuicao"><i class="fa fa-circle-o"></i>Pendente de Contribuição</a></li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i>Tipo de Contribuição
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/tipo/contribuicao/deposito"><i class="fa fa-circle-o"></i> Deposito </a></li>
                        <li><a href="/tipo/contribuicao/gaveta"><i class="fa fa-circle-o"></i> Gaveta</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    @endcan
    @can('visualizar administração')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>Administração</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Dados dos Usuários
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/selecionarUsuario')}}"><i class="fa fa-circle-o"></i> Usuários</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Autenticação
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/perfilUsuario')}}"><i class="fa fa-circle-o"></i>Perfis</a></li>
                        <li><a href="{{url('/permissoes')}}"><i class="fa fa-circle-o"></i>Permissões</a></li>
                        <li><a href="{{url('/grupoPermissao')}}"><i class="fa fa-circle-o"></i>Grupos</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    @endcan
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span>Sair</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>