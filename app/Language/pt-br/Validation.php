<?php

return [
	// Core Messages
	'noRuleSets'            => 'Nenhum conjunto de regras especificado na configuração de Validação.',
	'ruleNotFound'          => '{0} não é uma regra válida.',
	'groupNotFound'         => '{0} não é um grupo de regras de validação.',
	'groupNotArray'         => 'O grupo de regras {0} deve ser um array.',
	'invalidTemplate'       => '{0} não é um template de Validation válido.',

	// Rule Messages
	'alpha'                 => 'O campo <b>{field}</b> pode conter apenas caracteres alfabéticos.',
	'alpha_dash'            => 'O campo <b>{field}</b> pode conter apenas caracteres alfa-numéricos, sublinhados, e traços.',
	'alpha_numeric'         => 'O campo <b>{field}</b> pode conter apenas caracteres alfa-numéricos.',
	'alpha_numeric_space'   => 'O campo <b>{field}</b> pode conter apenas caracteres alfa-numéricos e espaços.',
	'alpha_space'           => 'O campo <b>{field}</b> pode conter apenas caracteres alfabéticos e espaços.',
	'decimal'               => 'O campo <b>{field}</b> deve conter um número decimal.',
	'differs'               => 'O campo <b>{field}</b> deve ser diferente do campo {param}.',
	'exact_length'          => 'O campo <b>{field}</b> deve conter exatamente {param} caracteres no tamanho.',
	'greater_than'          => 'O campo <b>{field}</b> deve conter um número maior que {param}.',
	'greater_than_equal_to' => 'O campo <b>{field}</b> deve conter um número maior ou igual a {param}.',
	'in_list'               => 'O campo <b>{field}</b> deve ser um desses: {param}.',
	'integer'               => 'O campo <b>{field}</b> deve conter um número inteiro.',
	'is_natural'            => 'O campo <b>{field}</b> deve conter apenas dígitos.',
	'is_natural_no_zero'    => 'O campo <b>{field}</b> deve conter apenas dígitos e deve ser maior que zero.',
	'is_unique'             => 'O campo <b>{field}</b> deve conter um valor único.',
	'less_than'             => 'O campo <b>{field}</b> deve conter um número menor que {param}.',
	'less_than_equal_to'    => 'O campo <b>{field}</b> deve conter um número menor ou igual a {param}.',
	'matches'               => 'O campo <b>{field}</b> não é igual ao campo {param}.',
	'max_length'            => 'O campo <b>{field}</b> não pode exceder {param} caracteres no tamanho.',
	'min_length'            => 'O campo <b>{field}</b> deve conter pelo menos {param} caracteres no tamanho.',
	'numeric'               => 'O campo <b>{field}</b> deve conter apenas números.',
	'regex_match'           => 'O campo <b>{field}</b> não está no formato correto.',
	'required'              => 'O campo <b>{field}</b> é obrigatório.',
	'required_with'         => 'O campo <b>{field}</b> é obrigatório quando {param} está presente.',
	'required_without'      => 'O campo <b>{field}</b> é obrigatório quando {param} não está presente.',
	'timezone'              => 'O campo <b>{field}</b> deve ser uma timezone válida.',
	'valid_base64'          => 'O campo <b>{field}</b> deve ser uma string base64 válida.',
	'valid_email'           => 'O campo <b>{field}</b> deve conter um endereço de e-mail válido.',
	'valid_emails'          => 'O campo <b>{field}</b> deve conter todos os endereços de e-mails válidos.',
	'valid_ip'              => 'O campo <b>{field}</b> deve conter um IP válido.',
	'valid_url'             => 'O campo <b>{field}</b> deve conter uma URL válida.',
	'valid_date'            => 'O campo <b>{field}</b> deve conter uma data válida.',

	// Credit Cards
	'valid_cc_num'          => '<b>{field}</b> não parece ser um número de cartão de crédito válido.',

	// Files
	'uploaded'              => '<b>{field}</b> não é um arquivo de upload válido.',
	'max_size'              => '<b>{field}</b> é um arquivo muito grande.',
	'is_image'              => '<b>{field}</b> não é um arquivo de imagem válida do upload.',
	'mime_in'               => '<b>{field}</b> não tem um tipo mime válido.',
	'ext_in'                => '<b>{field}</b> não tem uma extensão de arquivo válida.',
	'max_dims'              => '<b>{field}</b> não é uma imagem, ou ela é muito larga ou muito grande.',
];