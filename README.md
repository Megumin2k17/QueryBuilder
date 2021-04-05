# QueryBuilder

### 1. Создать экземпляр класса QueryBuilder
`$qb = new QueryBuilder;`

### 2. Чтобы создать запрос типа SELECT: может принимать массив или строку 
` $qb->select($table_name, '*');`
_// -> 'SELECT * FROM table_name'_
 
`$qb->select($table_name, [$column_name1, $column_name2]);`
_//->"SELECT ${columns} FROM ${table_name}"_

### 3. Чтобы создать запрос типа INSERT:
`$qb->insert($table_name, [$column_name => $value]);` 
_//-> 'INSERT INTO ${table_name} (${columns}) VALUES (${values})'_

### 4. Чтобы создать запрос типа UPDATE:
`$qb->update($table_name, [$column_name], [$condition_param, $condition_bool, $condition_value]);`
_//->"INSERT INTO ${table_name} (${column_name=:column_name}) VALUES (${values})"_

### 5. Чтобы создать запрос типа DELETE:
`$qb->delete($table_name, [$condition_param, $condition_bool, $condition_value]);`
_//-> "DELETE FROM ${table_name} WHERE ${condition}"_

