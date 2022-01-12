var snakeGame = function(table){
  //맵 가로 세로 사이즈
  var width = 896, height = 658;
  //맵 2차원 배열
  var board=[];
  //블록 사이즈
  var blockSize = '40px';
  // 스네이크
  var snake = 'black';
  //스네이크 방향 위, 오른쪽, 아래, 왼쪽 = 38, 39, 40, 37
  var snakeWay = 39;
  //게임 상태
  var gameState = 'wait';

  var start = function(){
    console.log('게임시작');
    gameState = 'play';
    // 1. 게임 화면 생성
    makeBoard();
  }
  // 1-1 맵 생성
  var makeBoard = function(){
    for(var h = 0;h<height;h++){
      board[h] = new Array(width);
      var tr = document.createElement('tr');
      for(var w=0;w<width;w++){
        var block = makeBlock();
        block.innerHTML = `${h},${w}`;
        tr.appendChild(block);
      }
      table.appendChild(tr);
    }
  };
  
  // 1-2 맵에 들어갈 블록 생성
  var makeBlock = function(){
    var block = document.createElement("td");
    block.style.backgroundColor = 'white';
    block.width = block.height = blockSize;
    return block; 
  };

  return{
    start : start
  };
};

var game = new snakeGame(snakeMap);
game.start();
