1.	O que é o Composer <br>
  1.1.	Composer é um gerenciador de dependências no qual evita o trabalho de baixar componentes para o processo do software.<br>
  1.2.	Ele trabalha com autoload.<br>
  1.3.	Exemplo <br>
    1.3.1.	PHPMailer, não é mais necessário baixar toda a biblioteca. Com os comandos do Composer, esse processo já será feito sem muito esforço do programador. <br>
    1.3.2.	Com somente uma chamada já pode baixar um framework como por exemplo, o Laravel. <br>
2.	Download <br>
  2.1.	https://getcomposer.org <br>
    2.1.1.	Nesse link contém a explicação de como baixar para cada sistema operacional. <br>
    2.1.2.	Para que o Composer funcione globalmente, tem um comando para rodar que fica em https://getcomposer.org/doc/00-intro.md#globally <br>
3.	Exemplo de arquivo json <br>
{ <br>
	"require": { <br>
		"phpmailer/phpmailer": "^5.2" <br>
	} <br>
} <br>
4.	Autoload <br>
  4.1.	O Composer não necessita de require nas classes, no caso é só chamar o autoload do Composer: require 'vendor/autoload.php'; <br>
5.	Pacote de dependências <br>
  5.1.	Para baixar todas as dependências, é só ir em https://packagist.org/ <br>
6.	Criar o próprio Composer <br>
  6.1.	Para criar o próprio Composer use o comando composer init <br>
7.	Composer update <br>
  7.1.	Comando composer update atualiza todos os pacotes inseridos no arquivo composer.json <br>
  7.2.	As dependências do pacote serão baixadas juntas. <br>
8.	Composer Require <br>
  8.1.	Com o comando composer require, irá dar a opção de buscar o pacote. Digitando o pacote irá aparecer as opções deste. Quando aparecer a opção de buscar, use o exemplo de swiftmailer ou ratchet. <br>
9.	minimum-stability <br>
  9.1.	O minimum-stability é um atributo definido dentro do composer.json como por exemplo: <br>
{ <br>
	"minimum-stability": "stable", <br>
} <br>
Este atributo baixará o pacote com a última versão estável, depois que for dado o comando composer update <br>
  9.2.	As opções são: <br>
    9.2.1.	dev <br>
    9.2.2.	alpha <br>
    9.2.3.	beta <br>
    9.2.4.	RC <br>
    9.2.5.	Stable <br>
    9.3.	Maiores detalhes em https://getcomposer.org/doc/04-schema.md#minimum-stability <br>
10.	Versionamento de pacote - Caret Version Range (^) <br>
  10.1.	O Caret Version Range, irá definir o limite de versão do pacote que será baixado. <br>
  10.2.	Exemplo: <br>
    10.2.1.	Irei definir no require do arquivo composer.json a versão 5.2.16 do phpmailer, sendo assim, quando for atualizado o Composer, irá baixar a versão <br> 
	5.2.26 (a última da versão 5), pois tem que ser menor que a versão 6 (já disponibilizada). Exemplo abaixo: <br>
{ <br>
require: { <br>
“phpmailer/phpmailer”: “^5.2.16” <br>
} <br>
} <br>
    10.2.2.	Caso tire o Caret Version Range (^), para que atualize a versão inserida no require, como de "phpmailer/phpmailer": "^5.2.16", para "phpmailer/phpmailer": "5.2.16", terá que ser dado o comando sudo composer update no Terminal. Nesse exemplo irá atualizar da versão 5.2.26 para 5.2.16. <br>
11.	composer.lock <br>
  11.1.	É um arquivo que mantém o histórico do que já foi feito no Composer. <br>
12.	Psr 4 – Padronizar o autoload <br>
  12.1.	Para padronizar o autoload, existe um site que exemplifica isso em https://www.php-fig.org/psr/psr-4/examples/ <br>
  12.2.	No link acima contém o código do autoload padrão para copiar. <br>
  12.3.	No caso será trabalhado namespaces. Exemplo logo abaixo: <br>
  12.4.	namespace app\models; <br>
class Produto { <br>
	public function create() { <br>
		return 'create'; <br>
	} <br>
} <br>
$email = new app\models\Produto; <br>
echo $email->create(); <br>
13.	Autoload do Composer <br>
  13.1.	O autoload pode ser definido dentro do arquivo composer.json, no caso definirá o padrão psr-4, definindo o namespace com prefixo seguido da localização (pasta). Exemplo logo abaixo: <br>
Composer.json <br>
"autoload": { <br>
    	"psr-4": { <br>
    		"app\\": "app", <br>
    		"asw\\": ["services", "jobs"] <br>
    	} <br>
    } <br>

jobs/Register.php <br>
namespace asw\jobs; <br>
class Register { <br>
	public function register()	{ <br>
		return 'register'; <br>
	} <br>
} <br>

Index.php <br>
$register = new asw\jobs\Register; <br>
echo $register->register(); <br>
	13.2.	Feito isso, terá que ser executado o comando composer dump-autoload -o no Terminal. Esse –o ¬no final do comando, significa que irá otimizar o autoload. <br>
	13.3.	O autoload serve também para chamar arquivos. Logo abaixo o exemplo de como definir no arquivo composer.json. <br>
“autoload”: { <br>
"files": ["functions/helpers.php"] <br>
} <br>
14.	Arquivos gerados <br>
  14.1.	Os arquivos gerados do Composer estão dentro de vendor/composer.
