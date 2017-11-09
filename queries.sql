
-- Find duplicates in table
SELECT `column` FROM `table` GROUP BY `column` HAVING COUNT(`column`) >= 2;

-- Get count table
SELECT `column`,COUNT(`column`) as `count` FROM `table` GROUP BY `column`;
