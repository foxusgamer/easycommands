select p.nome as product_name, php.quantidade as product_qtd, php.observacoes as product_obs, ped.status as order_status, ped.hora as order_time, ped.mesa as order_table_number, m.id as order_table_id from produtos as p
inner join pedidos_has_produtos as php on p.id = php.produtos_id
inner join pedidos as ped on php.pedidos_id = ped.id
inner join mesas as m on m.numero = ped.mesa;
