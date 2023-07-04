//permissions_enable: ['y', 'n']

const ListPermissions = [
  {
    id: 1,
    aba_label: 'Cadastro',
    description: 'department',
    description_label: 'Cadastro de Departamento',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 2,
    aba_label: 'Cadastro',
    description: 'operation_type',
    description_label: 'Cadastro de Tipo de Operação',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 3,
    aba_label: 'Cadastro',
    description: 'shipping_company',
    description_label: 'Cadastro de Transportadora',
    permissions: [
      'view_all',
      'view',
      'insert',
      'update',
      'delete',
      'link_operation_type',
    ],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
      'Vincular Tipo de Operações',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 4,
    aba_label: 'Cadastro',
    description: 'position',
    description_label: 'Cadastro de Cargo',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 5,
    aba_label: 'Cadastro',
    description: 'person',
    description_label: 'Cadastro de Pessoa',
    permissions: [
      'view_all',
      'view',
      'insert',
      'update',
      'delete',
      'link_operation_type',
      'link_shipping_company',
    ],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
      'Vincular Tipo de Operações',
      'Vincular Transportadora',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 6,
    aba_label: 'Cadastro',
    description: 'documents',
    description_label: 'Cadastro de Documentos',
    permissions: [
      'view_all',
      'view',
      'insert',
      'update',
      'delete',
      'link_operation_type',
    ],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
      'Vincular Tipo de Operações',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 7,
    aba_label: 'Cadastro',
    description: 'vehicle',
    description_label: 'Cadastro de Veículo',
    permissions: [
      'view_all',
      'view',
      'insert',
      'update',
      'delete',
      'link_shipping_company',
    ],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
      'Vincular Transportadora',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 8,
    aba_label: 'Cadastro',
    description: 'vehicle_composition',
    description_label: 'Cadastro de Composição de Veículo',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 9,
    aba_label: 'Cadastro',
    description: 'person_removed',
    description_label: 'Cadastro de Afastamento de Pessoa',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 10,
    aba_label: 'Cadastro',
    description: 'informative',
    description_label: 'Cadastro de Informativo',
    permissions: [
      'view_all',
      'view',
      'insert',
      'update',
      'delete',
      'link_operation_type',
      'views_informative',
    ],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
      'Vincular Tipo de Operações',
      'Visualizações do Informativo',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 11,
    aba_label: 'Cadastro',
    description: 'product',
    description_label: 'Cadastro de Produto',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
  {
    id: 12,
    aba_label: 'Cadastro',
    description: 'service',
    description_label: 'Cadastro de Serviço',
    permissions: ['view_all', 'view', 'insert', 'update', 'delete'],
    permissions_label: [
      'Visualizar Todos',
      'Visualizar',
      'Cadastrar',
      'Editar',
      'Excluir',
    ],
    permissions_enable: ['y', 'y', 'y', 'y', 'y'],
  },
];

