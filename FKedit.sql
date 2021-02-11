ALTER TABLE `venda_pneu` ADD CONSTRAINT `codprodutopneu1` FOREIGN KEY (`codproduto_pneu`) REFERENCES `produto_pneu`(`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `venda_pneu` ADD CONSTRAINT `codcliente1` FOREIGN KEY (`codcliente`) REFERENCES `cliente`(`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `venda_pneu` ADD CONSTRAINT `codfuncionario1` FOREIGN KEY (`codfuncionario`) REFERENCES `funcionario`(`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `venda_insumo` ADD CONSTRAINT `codprodutoinsumo1` FOREIGN KEY (`codproduto_insumo`) REFERENCES `produto_insumo`(`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `venda_insumo` ADD CONSTRAINT `codcliente2` FOREIGN KEY (`codcliente`) REFERENCES `cliente`(`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `venda_insumo` ADD CONSTRAINT `codfuncionario2` FOREIGN KEY (`codfuncionario`) REFERENCES `funcionario`(`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;


