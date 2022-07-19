## Trabalhando com Rotas
## Trabalhando com Controllers
## Blade

## Trabalhando com banco de dados (Eloquent ORM)
- Uso do tinker para executar os comandos e consultas na base de dados [php artisan tinker]
- Para criar registros basta instaciar o modelo, popular o objeto e chamar o [save], ou utilizar o método estático [create], 
  sendo no ultimo, necessário declarar os campos na variável [fillable] dentro do modelo.
- Método de consulta por id [find], podendo passar um id ou um range. Ex: Pessoa::find(1), Pessoa::find([1,3,6])
- Mais métodos de consulta [where] [whereIn] [whereNotIn] [whereBetween] [whereNotBetween] [whereDate] [whereTime] [where(Day,Mounth,Year)]
- Sintaxe do [where] ->where('<campo>', '<operador>', '<valor>'), sendo o operador ser um dos listados a seguir: >, <>, <=, >=, ==
- Para listar todos os registros de uma tabela, utilizar o método estático [all]. Ex: Pessoa::all()
- Para ordenar uma lista de resultados, utilizar o comando [orderBy]. Ex: Pessoa::orderBy('nome', 'desc')
- Para separar instruções de consulta em blocos, utilizar funções de callback. Ex: Pessoa:where('nome', 'Leo')->where(function    ($query) { <instruções normais>; }).osWhere(function ($query) { <instrções>; }) e assim por diante, colocando em cada função  instruções normais de consulta.  
- Para comparar o valor de uma coluna com outra, usar [whereCollumn]. Ex: Pessoa::whereCollumn('nome', 'username')
- Collections - retorna de consultas, é possível manipular com alguns métodos, tipos: [first,last,reverse,toArray,toJson,pluck]
- Collection [pluck] retorna campos específicos de um resultado. Ex: Pessoa::all()->pluck('nome') - retornará uma lista só com os nomes das pessoas.
- Existem muitos métodos úteis na classe Collection, consultar documentação para sabe mais, guia <Digging Deeper - Collections>
- Para editar e atualizar registros, podemos utilizar o método <save> de uma instância ou o método <fill> e <save>. Ex: Pessoa::fill(['nome', 'nome editado'])->save()
- Também podemos atualizar registros usando os métodos <where> e <update>. Ex: Pessoa::whereIn('id', [1,2,3])->update(['nome' => 'nome editado'])
- Para excluir registros, podemos usar o método <delete> de uma instância ou o método <destroy> da classe. Ex: Pessoa::destroy(1)
- Para exclusão lógica, usamos o conceito de SoftDeletes e para recuperamos em alguma consulta os registros removidos logicamente, utilizamos <withTrashed>, Ex: Pessoa:withTrashed()->get()
- Para recuperar somente os registros removidos logicamente, usamos o método <onlyTrashed>. Ex: Pessoa::onlyTrashed()
- Para restaurar um registro removido logiamente, usamos o comando <restore> na instância do objeto 

## Trabalhando com migrations
- [Criar migração] php artisan make:migration **nome_da_migracao**
- [Efetuar migração] php artisan migrate
- [Desfazer a migração anterior] php artisan migrate:rollback
- [Desfazer mais de uma migração] php artisan migrate:rollback --steps=1

### Comandos Status, Reset, Refresh e Fresh
- [Status] exibe todas as migrações e informa se foram executadas ou não
- [Reset] efetua rollback em todas as migrações, voltando ao estado original
- [Refresh] efetua rollback em todas as migrações e depois executa migrate para criar novamente
- [Fresh] dropa todas as tabelas no banco e depois executa migrate recriando tudo novamente

### Seeders
  - Para criar uma classe de seed, executar o comando [php artisan make:seeder FornecedorSeeder]
  - Podemos utilizar comando de criaçãod e registros utilizando os métodos <save>, <create> ou até mesmo usando o método <insert> da classe <DB>
  - Para popular as tabelas no banco de dados com o seed criado, executar o comando [php artisan db:seed]
  - Para popular utilizando um seeder específico, executar o comando [php artisan db:seed --class=NomeDaClasseSeeder]

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
